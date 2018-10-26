<?php
$nome=$_GET['nome'];
$endereco=$_GET['endereco'];
$cidade=$_GET['cidade'];
$curso=$_GET['curso'];
if ($nome=='' or $endereco=='' or $cidade=='' or $curso=='')
	print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "insert into aluno (nome, endereco, cidadeId, cursoId) values ('$nome', '$endereco', '$cidade', '$curso')")
	or die ("Nao foi possivel inserir aluno!");
	print("Aluno inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
