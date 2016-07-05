<?php
	require_once 'init.php';
 	$PDO = db_connect();
 	$sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC"; 
	$sql = "SELECT idFornecedor, nomeFornecedor ,  email , dataFundacao FROM fornecedores ORDER BY nomeFornecedor ASC";
 
 	$stmt_count = $PDO->prepare($sql_count);
 	$stmt_count->execute();
 	$total = $stmt_count->fetchColumn();
 
 	$stmt= $PDO->prepare($sql);
 	$stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Cadastro de Fornecedores</title>	
		<meta charset="utf-8">
	</head>

	<body>
		<div class="conteudo">
			<h1>Cadastro de Fornecedores</h1>
			<p><a href="form-addfornecedores.php">Adicionar Fornecedor</a></p>
			<h2>Lista de Fornecedores</h2>
			<p>Total de Fornecedores: <?php echo $total ?></p>
				<?php if($total > 0): ?>
				<table width="100%" border="1"> 
					<thead>			
						<tr>							
							<th>Identificação</th>
							<th>Nome</th>
							<th>Data de Cadastro</th>
							<th>Email</th>
							<th>Ações</th>
						</tr>
					</thead>
		</div>
					<tbody>
						<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
						<tr>					
							<td><?php echo $fornecedor['idFornecedor'] ?></td>
 							<td><?php echo $fornecedor['nomeFornecedor'] ?></td>
							<td><?php echo dateConvert($fornecedor['dataFundacao'])?></td>
							<td><?php echo $fornecedor['email']?></td>
							<td>
								<a href="form-editfornecedores.php?id=<?php echo $fornecedor['idFornecedor']?>">Editar</a>
								<a href="deletefornecedores.php?id=<?php echo $fornecedor['idFornecedor'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
							</td>
						</tr>
						<?php endwhile; ?>
 					</tbody>
				</table>
		<?php else: ?>
 		<p>Nenhum fornecedor registrado.</p>
 		<?php endif; ?>
	</body>
</html>
