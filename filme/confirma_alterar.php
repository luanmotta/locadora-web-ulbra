<?php
	$cursoId=$_GET['cursoId_alter'];
	$nome_alter=$_GET['nome_alter'];
	$dataAbertura_alter=$_GET['dataAbertura_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_curso = "
		UPDATE curso
		SET
			nome='$nome_alter',
			dataAbertura='$dataAbertura_alter'
		WHERE cursoId='$cursoId'
	;";

	mysqli_query($ok, $update_curso) or die ("Nao foi possivel alterar dados do curso!");

	print("Dados do curso <b>$nome_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
