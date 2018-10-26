<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta content="text/html;charset=utf-8" />
    <style>
      td {
        text-align: center;
      }
      button:hover {
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <?php
    require("../conecta.inc.php");

    $queryEstados = "
      SELECT
        estadoId,
        nome
      FROM estado
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $estados = mysqli_query($ok, $queryEstados) or die ("Nao foi possivel consultar estados.");

    print("<center><h2>Estados</h2>");
    print("<table border='1' bordercolor='red'>");
    print("<tr><td><b>Id</td>");
    print("<td><b>Nome</td>");
    print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

    while ($row = mysqli_fetch_array($estados)) {
       $id = $row["estadoId"];
       $estado = $row["nome"];

       print("<tr><td>$id</td>");
       print("<td>$estado</td>");
       print("<td><a href='deletar.php?id=$id'>Deletar</a></td>");
       print("<td><a href='alterar.php?id=$id'>Alterar</a></td></tr>");
    }
    print("</table></center>");

    ?>
    <hr>
    <a href="inserir.php"><button>Inserir Estado</button></a>
    <p><a href="../index.php">Voltar</a></p>
  </body>
</html>

