<?php
$nome=$_GET['nome'];
if ($nome=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into estado (nome) values ('$nome')")
	or die ("Nao foi possivel inserir estado!");
	print("Estado inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
