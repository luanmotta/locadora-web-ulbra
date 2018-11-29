<?php
$pedidoId = 0;
	$pedidoId=$_POST['pedidoId'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "update pedido set situacao = 1 where pedidoId='$pedidoId'") or die ("Nao foi possivel deletar alocacao!");
	print("Pedido finalizado com sucesso.");
?>
<p><a href="mostra.php">Voltar</a>
