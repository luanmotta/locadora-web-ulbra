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
	print("<h3>Alterando os dados do filme:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Id: <?php print($id)?>
<input type="hidden" name="filmeId_alter" value="<?php print($id)?>">

<br>Nome: <input type="text" name="nome_alter" value="<?php print($nome)?>">

<br>Data Abertura: <input type="text" name="valor_alter" value="<?php print($valor)?>">

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
