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
	print("<h3>Alterando os dados do curso:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Id: <?php print($id)?>
<input type="hidden" name="cursoId_alter" value="<?php print($id)?>">

<br>Nome: <input type="text" name="nome_alter" value="<?php print($nome)?>">

<br>Data Abertura: <input type="text" name="dataAbertura_alter" value="<?php print($dataAbertura)?>">

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
