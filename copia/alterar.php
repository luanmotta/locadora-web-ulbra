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
	print("<h3>Alterando os dados da cidade:</h3><p>");
?>
<form action="confirma_alterar.php" method="get">

Id: <?php print($id)?>
<input type="hidden" name="cidadeId_alter" value="<?php print($id)?>">

<br>Nome: <input type="text" name="cidade_alter" value="<?php print($cidade)?>">

<br>Estado: <select name="estadoId_alter">

<option value="<?php print("$estadoId");?>" selected><?php print("$estado");?></option>
<?php
$resultado2 = mysqli_query($ok, "Select * from estado where estadoId <> '$estadoId' order by nome") or die ("Nao foi possivel consultar estados.");
while ($linha = mysqli_fetch_array($resultado2)) {
   $estadoId = $linha["estadoId"];
   $nome = $linha["nome"];
   print("<option value='$estadoId'>$nome</option>");
}
?>
</select>

<p><input type="submit" value="Alterar Dados">
</form>
<p><a href="mostra.php">Cancelar e voltar</a>
