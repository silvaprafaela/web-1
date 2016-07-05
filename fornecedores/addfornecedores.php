<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';	
	
	// pega os dados do formulário
	$nomeFornecedor = isset($_POST['txtNome'])?$_POST['txtNome']:null;
	$dataFundacao = isset($_POST['txtData'])?$_POST['txtData']:null;
	$email = isset($_POST['txtEmail'])?$_POST['txtEmail']:null;
	// validação simples se campos estão vazios

	if( empty ($nomeFornecedor) || empty ($dataFundacao) || empty ($email) ){
		echo "Campos devem ser preenchidos!!";
		exit;
	}

	// instancia objeto fornecedor
	$fornecedor = new fornecedores($nomeFornecedor,$dataFundacao,$email);
	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO fornecedores(nomeFornecedor,dataFundacao,email) VALUES (:nomeFornecedor, :dataFundacao, :email)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nomeFornecedor',$fornecedor->getNomeFornecedor());
	$stmt->bindParam(':dataFundacao',$fornecedor->getDataFundacao());
	$stmt->bindParam(':email',$fornecedor->getEmail());
	if($stmt->execute()){
		header ('Location: index.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
