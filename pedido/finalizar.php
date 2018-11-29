<?php
	require("../conecta.inc.php");
	$ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
	$pedidoId = $_GET["pedidoId"];

	$queryPedido = "
	select c.nome, p.* 
		from cliente c inner join 
		pedido p on c.clienteId = p.clienteId 
		where p.pedidoId = $pedidoId
	;";

	$resultado1=mysqli_query($ok, $queryPedido) or die ("Nao foi possivel retornar dados do pedido!");
	$linha=mysqli_fetch_array($resultado1);

	$queryFilme = "
	select f.* from alocacao a inner join 
			pedido p on p.pedidoId = a.pedidoId inner join 
			filme f on f.filmeId = a.filmeId
			where p.pedidoId = $pedidoId;
	";

	$resultado2=mysqli_query($ok, $queryFilme) or die ("Nao foi possivel retornar dados da alocação!");
	
?>

<center>
	<form action="confirma_finalizar.php" method="post">
		<input type="hidden" value=<?php echo($pedidoId); ?> name="pedidoId">
		<table style="width: 600px" border='1'>
			<tr>
				<td>
					<span>Cliente:
						<?php echo($linha["nome"]); ?></span><br>
				</td>
				<td>
					<span>Situacao:
						<?php if ($linha["situacao"] == 0){
				   echo("Pendente");
			   }else{
				echo("Pago");
			   }?></span><br>
				</td>
			</tr>
			<tr>
				<th>Filme</th>
				<th>Valor</th>
			</tr>
			<?php 
		 $total = 0;
		 while ($row = mysqli_fetch_array($resultado2)){
			$nome = $row["nome"];
			$valor = $row["valor"];
			$total += $row["valor"];
		 ?>
			<tr>
				<td>
					<?php echo($nome); ?>
				</td>
				<td>
					<?php echo($valor); ?>
				</td>
			</tr>
			<?php
		 }
		 ?>
			<tr>
				<td style="font-weight: bold">Total a pagar:</td>
				<td style="font-weight: bold">
					<?php echo($total); ?>
				</td>
			</tr>
		</table>
		<?php if ($linha["situacao"] == 0){
		?>
		<div style="display: flex; justify-content: center"><input style="margin-top: 10px" type="submit" value="Finalizar Pedido"></div>
		<?php } ?>
	</form>
</center>
<p><a href="mostra.php">Cancelar e voltar</a>