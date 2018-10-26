<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryEstado = "
		SELECT
			estadoId,
			nome
		FROM estado
		WHERE estadoId = '$id'
	;";

	$resultado1=mysqli_query($ok, $queryEstado) or die ("Nao foi possivel retornar dados do estado!");
	$linha=mysqli_fetch_array($resultado1);
	$estadoId=$linha["estadoId"];
	$nome=$linha["nome"];

	print("<h3>Deletando o estado:</h3><p>");
	print("Id: $id<br>");
	print("Nome: <b>$nome</b><br>");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="estadoId_del" value="<?php print($id)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>