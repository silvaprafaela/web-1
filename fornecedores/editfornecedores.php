<?php
	require_once 'init.php';
 	include_once 'fornecedores.class.php';

 	$dadosOK = true;
		
	// pega os dados do formulário
	$id = isset ($_POST['id']) ? $_POST['id']:null;
 	$nomeFornecedor = isset ( $_POST ['txtNome']) ? $_POST ['txtNome']:null;
 	$dataFundacao = isset ($_POST['txtData']) ? $_POST ['txtData']:null;
 	$email = isset ($_POST['txtEmail']) ? $_POST ['txtEmail']:null;
 	// validação simples se campos estão vazios
 	if (empty ($nomeFornecedor) || empty ($dataFundacao))
 	{
 		echo "Campos devem ser preenchidos!!";
 		exit;
 	}
 	// instancia objeto fornecedor
 	$fornecedor = new Fornecedores ($nomeFornecedor ,$dataFundacao ,$email);
 	// atualiza o BD
 	$PDO = db_connect();
 	$sql = "UPDATE fornecedores SET nomeFornecedor = :nomeFornecedor,dataFundacao = :dataFundacao, email = :email WHERE idFornecedor = :id";
 	$stmt = $PDO-> prepare($sql);
	$stmt ->bindParam(':nomeFornecedor', $fornecedor->getNomeFornecedor());
 	$stmt ->bindParam(':dataFundacao', $fornecedor->getDataFundacao());
 	$stmt ->bindParam(':email',$fornecedor->getEmail());
 	$stmt ->bindParam(':id', $id,PDO::PARAM_INT);

 	if ($stmt->execute())
	{
 		header ('Location:fornecedores.php');
 	}
 	else
 	{
 		echo "Erro ao alterar";
 		print_r($stmt->errorInfo());
 	}
?>
