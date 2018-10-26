<?php
$nome=$_GET['nome'];
$estado=$_GET['estado'];
if ($nome=='' or $estado=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into cidade (nome, estadoId) values ('$nome', '$estado')")
	or die ("Nao foi possivel inserir cidade!");
	print("Cidade inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
