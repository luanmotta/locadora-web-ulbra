<?php
    require("../conecta.inc.php");
    $nome = $_GET["pesquisar"];
    $situacao = $_GET["situacao"];
    $sql = "";
    if ($situacao == 0 || $situacao == 1){
        $sql = "and p.situacao = $situacao";
    }
    $queryPedidos = "
    SELECT c.nome, p.situacao, p.pedidoId  FROM 
	pedido p inner join 
    cliente c on p.clienteId = c.clienteId
    WHERE c.nome LIKE '%$nome%' $sql
      ;";
  
      $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
      $pedidos = mysqli_query($ok, $queryPedidos) or die ("Nao foi possivel consultar pedidos.");
      if ($pedidos){
        while($row = $pedidos->fetch_object())
        {
            foreach($row as $key => $col){
               $col_array[$key] = utf8_encode($col);
            }
            $row_array[] =  $col_array;
    
        }
    
        echo json_encode($row_array);
      }
?>
