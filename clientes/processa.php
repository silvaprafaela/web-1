<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>	
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			include_once 'cliente.class.php';
			include_once 'conexao.class.php';
			$camposOK=true;
			
			//Recebe o valor dos campos//
			
			$nomeCliente = $_POST["txtNome"]; //post metodo de envio de dados			
			$email = $_POST["txtEmail"];
			$dataCadastro = $_POST["txtData"];
			$data = explode("/",$dataCadastro);
	
			//Verifica nome//
			if ( $nomeCliente == "" ){
				echo "Informe o nome <br>";
				$camposOK = false;
			}
			
			//Valida data//
			if (($data[2] <= 2016) && ($data[2]>0000)){				
				if (($data[1] == 04) || ($data[1] == 06)  || ($data[1] == 09) || ($data[1] == 11)){
					if(($data[0] <= 30) && ($data[0] > 00)){	
					}else{	
						$camposOK = false;
					}
				} else if (($data[1] == 01) || ($data[1] == 03)  || ($data[1] == 05) || ($data[1] == 07) || ($data[1] == 08)|| ($data[1] == 10)|| ($data[1] == 12) ){
					if(($data[0] <= 31) && ($data[0] > 00)){	
					}else{	
						$camposOK = false;
					}
				}else if ($data[1] == 02){
					if ($data[2] % 4 ==0){
						if ($data[2] % 100 !=0){
							if ($data[0] <= 29){
							} else if ($data[2] % 400 ==0){
									if (($data[0] <= 29) && ($data[0] > 00)){						
									}else{	
										$camposOK = false;
									}
							} else if (($data[0] <= 28) && ($data[0] > 00)){
								}else{
									$camposOK = false;
								}
						}else{
							$camposOK = false;
						}
					}else{
						echo "A data está inválida <br>";
						$camposOK = false;
					}
				}
			}
			
			
			
			//Escrever tudo
			if( $camposOK ){
				
				$cliente = new clientes($nomeCliente,$email,$dataCadastro);
				$MySQL = new MySQL;
				
				try{
					$MySQL->inserirAluno($cliente->getNomeCliente(), $cliente->getEmail(), $cliente->getDataCadastro());
					echo "Dados gravados com sucesso <br>";
				}catch (Exception $e){
					echo "Erro ao inserir: ". $e->getMessage() . "<br>" ;
				}
			}
		?>
	</body>
</html>
