<center>
<form action="inserido.php" method="get">
<table border='1' align='center'>
<tr><td align='center'>

Nome: <input type="text" name="nome"><br>

Estado: <select name="estado">
<?php
require("../conecta.inc.php");
$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
$resultado=mysqli_query($ok, "Select * from estado order by nome") or die ("Nao foi possivel consultar estados.");
while ($linha=mysqli_fetch_array($resultado)) {
   $estadoId=$linha["estadoId"];
   $nome=$linha["nome"];
   print("<option value='$estadoId'>$nome</option>");
}
?>
</select><br>

<br>
<input type="submit" value="Inserir Cidade">
</td></tr>
</table>
</form>
<p><a href="mostra.php">Voltar</a>
</center>