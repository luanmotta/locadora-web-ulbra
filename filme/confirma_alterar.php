<?php
	$filmeId=$_GET['filmeId_alter'];
	$nome_alter=$_GET['nome_alter'];
	$valor_alter=$_GET['valor_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_filme = "
		UPDATE filme
		SET
			nome='$nome_alter',
			valor='$valor_alter'
		WHERE filmeId='$filmeId'
	;";

	mysqli_query($ok, $update_filme) or die ("Nao foi possivel alterar dados do curso!");

	print("Dados do curso <b>$nome_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
