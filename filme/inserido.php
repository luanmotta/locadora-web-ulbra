<?php
$nome=$_GET['nome'];
$dataAbertura=$_GET['dataAbertura'];
if ($nome=='' or $dataAbertura=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into curso (nome, dataAbertura) values ('$nome', '$dataAbertura')")
	or die ("Nao foi possivel inserir curso!");
	print("Curso inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
