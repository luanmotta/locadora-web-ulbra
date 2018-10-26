<?php
	$estadoId=$_GET['estadoId_alter'];
	$nome_alter=$_GET['nome_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_estado = "
		UPDATE estado
		SET
			nome='$nome_alter'
		WHERE estadoId='$estadoId'
	;";

	mysqli_query($ok, $update_estado) or die ("Nao foi possivel alterar dados do estado!");

	print("Dados do estado <b>$nome_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
