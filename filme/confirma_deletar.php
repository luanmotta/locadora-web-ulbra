<?php
	$id=$_GET['cursoId_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from curso where cursoId='$id'") or die ("Nao foi possivel deletar curso!");
	print("Curso deletado com sucesso (id: $id)");
?>
<p><a href="mostra.php">Mostrar</a>
