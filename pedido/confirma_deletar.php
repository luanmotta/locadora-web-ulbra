<?php
	$pedidoId=$_GET['pedidoId'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from alocacao where pedidoId='$pedidoId'") or die ("Nao foi possivel deletar alocacao!");
	mysqli_query($ok, "delete from pedido where pedidoId='$pedidoId'") or die ("Nao foi possivel deletar pedido!");
	print("Pedido deletado com sucesso (matricula: $matricula)");
?>
<p><a href="mostra.php">Voltar</a>
