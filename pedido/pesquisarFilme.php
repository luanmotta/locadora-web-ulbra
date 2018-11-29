<?php
    require("../conecta.inc.php");
    $nome = $_GET["pesquisar"];
      $queryPedidos = "
      SELECT * FROM filme
        WHERE nome LIKE '%$nome%' LIMIT 10
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
