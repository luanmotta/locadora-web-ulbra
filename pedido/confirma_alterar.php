<?php
	$matricula=$_GET['matricula_alter'];
	$nome_alter=$_GET['nome_alter'];
	$endereco_alter=$_GET['endereco_alter'];
	$cidade_alter=$_GET['cidade_alter'];
	$curso_alter=$_GET['curso_alter'];

	require("../conecta.inc.php");

	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$update_aluno = "
		UPDATE aluno
		SET
			nome='$nome_alter',
			endereco='$endereco_alter',
			cidadeId='$cidade_alter',
			cursoId='$curso_alter'
		WHERE matricula='$matricula'
	;";

	mysqli_query($ok, $update_aluno) or die ("Nao foi possivel alterar dados do aluno!");

	print("Dados do aluno <b>$nome_alter</b> alterados com sucesso!");

?>
<p><a href="mostra.php">Mostrar</a>
