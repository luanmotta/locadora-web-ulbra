<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryCliente = "
		SELECT
			id,
			nome,
			endereco
		FROM cliente
		WHERE id = '$id'
	;";

	$resultado1=mysqli_query($ok, $queryCliente) or die ("Nao foi possivel retornar dados do cliente!");
	$linha=mysqli_fetch_array($resultado1);
	$clienteId=$linha["clienteId"];
	$nome=$linha["nome"];
	$endereco=$linha["endereco"];

	print("<h3>Deletando o cliente:</h3><p>");
	print("Id: $id<br>");
	print("Nome: <b>$nome</b><br>");
	print("Endereco: <b>$endereco</b><br>");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="clienteId_del" value="<?php print($id)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>