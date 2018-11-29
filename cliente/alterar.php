<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryCliente = "
      SELECT
        clienteId,
				nome,
				endereco
			FROM cliente
			WHERE clienteId = '$id'
    ;";

	$resultado1=mysqli_query($ok, $queryCliente) or die ("Nao foi possivel retornar dados do cliente!");
	$linha=mysqli_fetch_array($resultado1);
	$clienteId=$linha["clienteId"];
	$nome=$linha["nome"];
	$endereco=$linha["endereco"];
	print("<h3>Alterando os dados do cliente:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Id: <?php print($id)?>
<input type="hidden" name="clienteId_alter" value="<?php print($id)?>">

<br>Nome: <input type="text" name="nome_alter" value="<?php print($nome)?>">

<br>Endereco: <input type="text" name="endereco_alter" value="<?php print($endereco)?>">

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
