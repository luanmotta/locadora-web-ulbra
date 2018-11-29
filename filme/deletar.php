<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryCurso = "
		SELECT
			cursoId,
			nome,
			dataAbertura
		FROM curso
		WHERE cursoId = '$id'
	;";

	$resultado1=mysqli_query($ok, $queryCurso) or die ("Nao foi possivel retornar dados do curso!");
	$linha=mysqli_fetch_array($resultado1);
	$cursoId=$linha["cursoId"];
	$nome=$linha["nome"];
	$dataAbertura=$linha["dataAbertura"];

	print("<h3>Deletando o filme:</h3><p>");
	print("Id: $id<br>");
	print("Nome: <b>$nome</b><br>");
	print("Data Abertura: <b>$dataAbertura</b><br>");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="cursoId_del" value="<?php print($id)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>