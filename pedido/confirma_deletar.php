<?php
	$pedidoId=$_POST['pedidoId'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from alocacao where pedidoId='$pedidoId'") or die ("Nao foi possivel deletar alocacao!");
	mysqli_query($ok, "delete from pedido where pedidoId='$pedidoId'") or die ("Nao foi possivel deletar pedido!");
	print("Pedido deletado com sucesso.");
?>
<p><a href="mostra.php">Voltar</a>
