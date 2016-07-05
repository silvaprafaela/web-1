<?php
require_once 'init.php';
 $PDO = db_connect();
 $sql_count = "SELECT COUNT(*) AS total FROM cliente ORDER BY nomeCliente ASC";
 
$sql = "SELECT idCliente, nomeCliente , dataCadastro , email FROM cliente ORDER BY nomeCliente ASC";
 
 $stmt_count = $PDO->prepare($sql_count);
 $stmt_count->execute();
 $total = $stmt_count->fetchColumn();
 
 $stmt= $PDO->prepare($sql);
 $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>	
		<meta charset="utf-8">
	</head>
	<body>
			<h1>Cadastro de Clientes</h1>
			<p><a href="form-add.php">Adicionar Cliente</a></p>
			<h2>Lista de Clientes</h2>
			<p>Total de Clientes: <?php echo $total ?></p>
				<?php if($total > 0): ?>
				<table width="100%" border="1"> 
					<thead>			
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Data de Cadastro</th>
							<th>Email</th>							
							<th>Ações</th>
						</tr>
					</thead>
				<tbody>
				<?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					
					<td><?php echo $cliente['idCliente'] ?></td>
 					<td><?php echo $cliente['nomeCliente'] ?></td> 					
					<td><?php echo dateConvert($cliente['dataCadastro'])?></td>
					<td><?php echo $cliente['email'] ?></td>
					<td>
					<a href="form-edit.php?id=<?php echo $cliente['idCliente'];?>"> Editar</a>
					<a href="delete.php?id=<?php echo $cliente['idCliente'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </a>
					</td>
				</tr>
				 <?php endwhile; ?>
 				</tbody>
					</table>
 			<?php else: ?>
 		<p> Nenhum usuário registrado </p>
 		<?php endif; ?>
 	</body>
 </html>
		
