<center>
<form action="inserido.php" method="get">
<table border='1' align='center'>
<tr><td align='center'>

Nome: <input type="text" name="nome"><br>

Endereco: <input type="text" name="endereco"><br>

Cidade: <select name="cidade">
<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
$resultado=mysqli_query($ok, "Select * from cidade order by nome") or die ("Nao foi possivel consultar cidades.");
while ($linha=mysqli_fetch_array($resultado)) {
   $CidadeId=$linha["cidadeId"];
   $Nome=$linha["nome"];
   print("<option value='$CidadeId'>$Nome</option>");
}
?>
</select><br>

Curso: <select name="curso">
<?php
$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
$resultado=mysqli_query($ok, "Select * from curso order by nome") or die ("Nao foi possivel consultar cursos.");
while ($linha=mysqli_fetch_array($resultado))
{
   $CursoId=$linha["cursoId"];
   $Nome=$linha["nome"];
   print("<option value='$CursoId'>$Nome</option>");
}
?>
</select><br>

<br>
<input type="submit" value="Inserir Aluno">
</td></tr>
</table>
</form>
<p><a href="mostra.php">Voltar</a>
</center>