<?php
	$matricula=$_GET['matricula_del'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	mysqli_query($ok, "delete from aluno where matricula='$matricula'") or die ("Nao foi possivel deletar aluno!");
	print("Aluno deletado com sucesso (matricula: $matricula)");
?>
<p><a href="mostra.php">Mostrar</a>
