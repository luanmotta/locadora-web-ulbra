<?php
	$id=$_GET['filmeId_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from filme where filmeId='$id'") or die ("Nao foi possivel deletar filme!");
	print("Filme deletado com sucesso (id: $id)");
?>
<p><a href="mostra.php">Mostrar</a>
