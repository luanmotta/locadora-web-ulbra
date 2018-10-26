<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryCidades = "
		SELECT
			cidade.cidadeId AS cidadeId,
			cidade.nome AS cidade,
			estado.nome AS estado,
			estado.estadoId AS estadoId
		FROM cidade, estado
		WHERE cidade.cidadeId = '$id'
		AND cidade.estadoId = estado.estadoId
	;";

	$resultado1=mysqli_query($ok, $queryCidades) or die ("Nao foi possivel retornar dados da cidade!");
	$linha=mysqli_fetch_array($resultado1);
	$cidadeId=$linha["cidadeId"];
	$cidade=$linha["cidade"];
	$estado=$linha["estado"];
	$estadoId=$linha["estadoId"];

	print("<h3>Deletando a cidade:</h3><p>");
	print("Id: $id<br>");
	print("Nome: <b>$cidade</b><br>");
	print("Estado: $estado<br>");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="cidadeId_del" value="<?php print($id)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>