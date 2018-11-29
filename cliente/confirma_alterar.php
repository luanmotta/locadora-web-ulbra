<?php
	$clienteId=$_GET['clienteId_alter'];
	$nome_alter=$_GET['nome_alter'];
	$endereco_alter=$_GET['endereco_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_cliente = "
		UPDATE cliente
		SET
			nome='$nome_alter',
			endereco='$endereco_alter'
		WHERE clienteId='$clienteId'
	;";

	mysqli_query($ok, $update_cliente) or die ("Nao foi possivel alterar dados do cliente!");

	print("Dados do cliente <b>$nome_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
