<?php 
	class MySQL{	
		//declaracao de variaveis//		
		var $host = "localhost";
		var $user = "root";
		var $password = "root";
		var $database = "BD-CEFETMG";
		var $link;
		var $query;
		var $result;

		function connect(){
			$this->link = mysql_connect($this->host, $this->user, $this->password);
			if(!$this->link){
				echo "Falha na conexão<br>";
				echo "Erro ".mysql_error();
				die();			
			}else if(!mysql_select_db($this->database, $this->link)){
				echo "O Banco de Dados não pôde ser aberto.<br>";
				echo "Erro ".mysql_error();
				die();
			}
		}
		
		//funcao de desconexao//
		function disconnect(){
			return mysql_close($this->link);
		}
		
		//funcao de execucao//
		function executeQuery($query){
			$this->connect();
			$this->query = $query;
			if($this->result=mysql_query($this->query)){
				$this->disconnect();
				return $this->result;
			}else{
				echo "Ocorreu um erro ".mysql_error();
				die();
				disconnect();
			}
		}
		
		//funcao de inserir/
		function inserirFornecedor($nomeFornecedor, $email, $dataFundacao){
			$sqlfornecedores="insert into fornecedores (nomeFornecedor, email, dataFundacao) VALUES ('$nomeFornecedor','$email','$dataFundacao')";
			$this->executeQuery($sqlfornecedores);
		}
	}
?>
