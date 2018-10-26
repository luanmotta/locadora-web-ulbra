<?php
	$id=$_GET['estadoId_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from estado where estadoId='$id'") or die ("Nao foi possivel deletar estado!");
	print("Estado deletado com sucesso (id: $id)");
?>
<p><a href="mostra.php">Mostrar</a>
