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

    $queryCursos = "
      SELECT
        cursoId,
        nome,
        dataAbertura
      FROM curso
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $cursos = mysqli_query($ok, $queryCursos) or die ("Nao foi possivel consultar cursos.");

    print("<center><h2>Cursos</h2>");
    print("<table border='1' bordercolor='red'>");
    print("<tr><td><b>Id</td>");
    print("<td><b>Nome</td>");
    print("<td><b>Data Abertura</td>");
    print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

    while ($row = mysqli_fetch_array($cursos)) {
       $id = $row["cursoId"];
       $nome = $row["nome"];
       $dataAbertura = $row["dataAbertura"];

       print("<tr><td>$id</td>");
       print("<td>$nome</td>");
       print("<td>$dataAbertura</td>");
       print("<td><a href='deletar.php?id=$id'>Deletar</a></td>");
       print("<td><a href='alterar.php?id=$id'>Alterar</a></td></tr>");
    }
    print("</table></center>");

    ?>
    <hr>
    <a href="inserir.php"><button>Inserir Curso</button></a>
    <p><a href="../index.php">Voltar</a></p>
  </body>
</html>

