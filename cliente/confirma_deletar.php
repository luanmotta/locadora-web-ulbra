<?php
	$id=$_GET['clienteId_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from cliente where clienteId='$id'") or die ("Nao foi possivel deletar cliente!");
	print("Cliente deletado com sucesso (id: $id)");
?>
<p><a href="mostra.php">Mostrar</a>
