<?php
$nome=$_GET['nome'];
$endereco=$_GET['endereco'];
if ($nome=='' or $endereco=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into cliente (nome, endereco) values ('$nome', '$endereco')")
	or die ("Nao foi possivel inserir cliente!");
	print("Cliente inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
