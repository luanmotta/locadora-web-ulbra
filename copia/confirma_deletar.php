<?php
	$id=$_GET['cidadeId_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from cidade where cidadeId='$id'") or die ("Nao foi possivel deletar cidade!");
	print("Cidade deletada com sucesso (id: $id)");
?>
<p><a href="mostra.php">Mostrar</a>
