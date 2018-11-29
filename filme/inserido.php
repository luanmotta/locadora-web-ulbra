<?php
$nome=$_GET['nome'];
$valor=$_GET['valor'];
if ($nome=='' or $valor=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into filme (nome, valor) values ('$nome', '$valor')")
	or die ("Nao foi possivel inserir filme!");
	print("Filme inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
