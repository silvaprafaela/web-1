<?php
	require_once 'init.php';
 	include_once 'cliente.class.php';
 	

		 // pega os dados do formulário
		$idCliente = isset($_POST['id']) ? $_POST['id'] : null;
 		$nomeCliente = isset( $_POST ['txtNome']) ? $_POST ['txtNome'] : null;
 		$dataCadastro = isset($_POST['txtData']) ? $_POST ['txtData'] : null;
 		$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
 		// validação simples se campos estão vazios
 		if (empty ($nomeCliente) || empty ($email) || empty ($dataCadastro))
 		{
 			echo "Campos devem ser preenchidos!!";
 			echo "Nome ".$nomeCliente." data ".$dataCadastro."email ".$email;
 			exit;
 		}
 		// instancia objeto aluno
 		$cliente = new clientes ($nomeCliente,$dataCadastro,$email);
 		// atualiza o BD
 		$PDO = db_connect();
 		$sql = "UPDATE cliente SET nomeCliente = :name, dataCadastro = :data , email = :email WHERE idCliente = :id";
 		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':name', $cliente->getNomeCliente());
 		$stmt->bindParam(':data',$cliente->getDataCadastro());
 		$stmt->bindParam(':email', $cliente->getEmail());
 		$stmt->bindParam(':id', $idCliente, PDO::PARAM_INT);

 		if ($stmt->execute())
 		{
 			header ('Location:index.php');
 		}
 		else
 		{
 			echo "Erro ao alterar";
 			print_r($stmt->errorInfo());
 			echo $cliente->getNomeCliente()." ".$cliente->getDataCadastro()." ".$cliente->getEmail()." ".$idCliente;
 		}
 		?>
