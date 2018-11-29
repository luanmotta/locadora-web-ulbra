<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryFilme = "
		SELECT
			filmeId,
			nome,
			valor
		FROM filme
		WHERE filmeId = '$id'
	;";

	$resultado1=mysqli_query($ok, $queryFilme) or die ("Nao foi possivel retornar dados do filme!");
	$linha=mysqli_fetch_array($resultado1);
	$filmeId=$linha["filmeId"];
	$nome=$linha["nome"];
	$valor=$linha["valor"];

	print("<h3>Deletando o filme:</h3><p>");
	print("Id: $id<br>");
	print("Nome: <b>$nome</b><br>");
	print("Valor: <b>$valor</b><br>");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="filmeId_del" value="<?php print($id)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>