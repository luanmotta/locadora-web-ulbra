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
	print("<h3>Alterando os dados do estado:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Id: <?php print($id)?>
<input type="hidden" name="estadoId_alter" value="<?php print($id)?>">

<br>Nome: <input type="text" name="nome_alter" value="<?php print($nome)?>">

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
