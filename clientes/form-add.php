<?php
	require 'init.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<title>Envio de Dados</title>	
		<meta charset="utf-8">
		<link type="text/css" href="jquery-ui.css" rel="stylesheet">
		<script type ="text/javascript" src ="jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="jquery-ui.js"></script>
		<script type ="text/javascript" src ="jquery.maskedinput.js"></script>
		<script type="text/javascript" src="datepicker-pt-BR.js"></script>	
		<script type="text/javascript" src="validacliente.js"></script>
		<link type="text/css" href="rafalinda.css" rel="stylesheet">	
	</head>

	<body>
		<form method="post" name="formCadastro" action="add.php" enctype="multipart/form-data">
				<h1>Cadastro Clientes</h1>
			<table width="100%">
				<tr>
					<th width="18%">Nome:</th>
					<td width="82%"><input type="text" id="nome" name="txtNome"></td>
				</tr>				
				<tr>								
								
				<tr>
					<th>Data de Cadastro:</th>
					<td><input type="text" id="data" name="txtData" class="calendarioC" readonly></td>
				</tr>

				<tr>
					<th>Email:</th>
					<td><input type="text" name="txtEmail"></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>				
					<td><input type="submit" name="bntEnviar" value="Cadastrar" onliclck="validacliente()"></input>
					<input type="reset" name="bntLimpar" value="Limpar"></td>
				</tr>

			</table>
		</form>
	</body>		
</html>
