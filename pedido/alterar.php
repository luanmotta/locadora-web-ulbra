<?php
	$id=$_GET['id'];
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");

	$queryAluno = "
		SELECT
			matricula,
			aluno.nome AS nome,
			aluno.endereco AS endereco,
			cidade.nome AS cidade,
			cidade.cidadeId AS cidadeId,
			curso.nome AS curso,
			curso.cursoId AS cursoId
		FROM aluno, cidade, curso
		WHERE aluno.matricula = '$id'
		AND aluno.cursoId = curso.cursoId
		AND aluno.cidadeId = cidade.cidadeId
	;";

	$resultado1=mysqli_query($ok, $queryAluno) or die ("Nao foi possivel retornar dados do aluno!");
	$linha=mysqli_fetch_array($resultado1);
	$matricula=$linha["matricula"];
	$nome=$linha["nome"];
	$endereco=$linha["endereco"];
	$cidade=$linha["cidade"];
	$cidadeId=$linha["cidadeId"];
	$curso=$linha["curso"];
	$cursoId=$linha["cursoId"];
	print("<h3>Alterando os dados do aluno:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Matricula: <?php print($matricula)?>
<input type="hidden" name="matricula_alter" value="<?php print($matricula)?>">

<br>Nome: <input type="text" name="nome_alter" value="<?php print($nome)?>">
<br>Endereco: <input type="text" name="endereco_alter" value="<?php print($endereco)?>">

<br>Cidade: <select name="cidade_alter">

<option value="<?php print("$cidadeId");?>" selected><?php print("$cidade");?></option>
<?php
$resultado2 = mysqli_query($ok, "Select * from cidade where cidadeId <> '$cidadeId' order by nome") or die ("Nao foi possivel consultar cidades.");
while ($linha = mysqli_fetch_array($resultado2)) {
   $cidadeId = $linha["cidadeId"];
   $nome = $linha["nome"];
   print("<option value='$cidadeId'>$nome</option>");
}
?>
</select>

<br>Curso: <select name="curso_alter">

<option value="<?php print("$cursoId");?>" selected><?php print("$curso");?></option>
<?php
$resultado2 = mysqli_query($ok, "Select * from curso where cursoId <> '$cursoId' order by nome") or die ("Nao foi possivel consultar cursos.");
while ($linha = mysqli_fetch_array($resultado2)) {
   $cursoId = $linha["cursoId"];
   $nome = $linha["nome"];
   print("<option value='$cursoId'>$nome</option>");
}
?>
</select>

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
