<?php
$cliente=$_POST['cliente'];
$filmes=$_POST['filmes'];

if ($cliente == '0' or count($filmes) == 0 )
	print(count($filmes));
	// print("Faltou preencher algum campo...");
else
{
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	$valorFilme = 0.0;
	foreach ($filmes as $key => $value) {
		$query = "select valor from filme where filmeId = $value";
		$valorFilme += mysqli_fetch_array(mysqli_query($ok, $query))[0].["valor"];
	}
	$dataAtual = date("d/m/Y");
	mysqli_query($ok, "insert into pedido (clienteId, valorTotal, dataPedido, situacao) values ('$cliente', '$valorFilme', '$dataAtual', 0)") or die ("Nao foi possivel inserir aluno!");
	$newId = mysqli_insert_id($ok);
	foreach ($filmes as $key => $value) {
		mysqli_query($ok, "insert into alocacao (pedidoId, filmeId) values ('$newId', '$value')");
	}
	print("Pedido inserido com sucesso: $nome");
}
?>
<p><a href="inserir.php">Voltar</a>
<p><a href="mostra.php">Mostrar</a>
