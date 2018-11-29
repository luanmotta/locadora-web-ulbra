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

	print("<h3>Deletando o aluno:</h3><p>");
	print("Matricula: $matricula<br>");
	print("Nome: <b>$nome</b><br>");
	print("Endereco: $endereco<br>");
	print("Cidade: $cidade<br>");
	print("Curso: $curso");
?>
<form action="confirma_deletar.php" method="get">
<input type="hidden" name="matricula_del" value="<?php print($matricula)?>">
<br><input type="submit" value="Deletar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>