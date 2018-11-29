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

    $queryClientes = "
      SELECT
        clienteId,
        nome,
        endereco
      FROM cliente
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $clientes = mysqli_query($ok, $queryClientes) or die ("Nao foi possivel consultar clientes.");

    print("<center><h2>Clientes</h2>");
    print("<table border='1' bordercolor='red'>");
    print("<tr><td><b>Id</td>");
    print("<td><b>Nome</td>");
    print("<td><b>Endereco</td>");
    print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

    while ($row = mysqli_fetch_array($clientes)) {
       $id = $row["clienteId"];
       $nome = $row["nome"];
       $endereco = $row["endereco"];

       print("<tr><td>$id</td>");
       print("<td>$nome</td>");
       print("<td>$endereco</td>");
       print("<td><a href='deletar.php?id=$id'>Deletar</a></td>");
       print("<td><a href='alterar.php?id=$id'>Alterar</a></td></tr>");
    }
    print("</table></center>");

    ?>
    <hr>
    <a href="inserir.php"><button>Inserir Cliente</button></a>
    <p><a href="../index.php">Voltar</a></p>
  </body>
</html>

