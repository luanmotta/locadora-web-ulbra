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

    $queryCidades = "
      SELECT
        cidade.cidadeId AS id,
        cidade.nome AS cidade,
        estado.nome AS estado
      FROM cidade, estado
      WHERE cidade.estadoId = estado.estadoId
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $cidades = mysqli_query($ok, $queryCidades) or die ("Nao foi possivel consultar cidades.");

    print("<center><h2>Cidades</h2>");
    print("<table border='1' bordercolor='red'>");
    print("<tr><td><b>Id</td>");
    print("<td><b>Nome</td>");
    print("<td><b>Estado</td>");
    print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

    while ($row = mysqli_fetch_array($cidades)) {
       $id = $row["id"];
       $cidade = $row["cidade"];
       $estado = $row["estado"];

       print("<tr><td>$id</td>");
       print("<td>$cidade</td>");
       print("<td>$estado</td>");
       print("<td><a href='deletar.php?id=$id'>Deletar</a></td>");
       print("<td><a href='alterar.php?id=$id'>Alterar</a></td></tr>");
    }
    print("</table></center>");

    ?>
    <hr>
    <a href="inserir.php"><button>Inserir Cidade</button></a>
    <p><a href="../index.php">Voltar</a></p>
  </body>
</html>

