<?php
	$cidadeId=$_GET['cidadeId_alter'];
	$cidade_alter=$_GET['cidade_alter'];
	$estadoId_alter=$_GET['estadoId_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_cidade = "
		UPDATE cidade
		SET
			nome='$cidade_alter',
			estadoId='$estadoId_alter'
		WHERE cidadeId='$cidadeId'
	;";

	mysqli_query($ok, $update_cidade) or die ("Nao foi possivel alterar dados da cidade!");

	print("Dados da cidade <b>$cidade_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
