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

    $queryAlunos = "
      SELECT
        matricula,
        aluno.nome AS nome,
        aluno.endereco AS endereco,
        cidade.nome AS cidade,
        curso.nome AS curso
      FROM aluno, cidade, curso
      WHERE aluno.cursoId = curso.cursoId
      AND aluno.cidadeId = cidade.cidadeId
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $alunos = mysqli_query($ok, $queryAlunos) or die ("Nao foi possivel consultar alunos.");

    print("<center><h2>Alunos</h2>");
    print("<table border='1' bordercolor='red'>");
    print("<tr><td><b>Matricula</td>");
    print("<td><b>Nome</td>");
    print("<td><b>Endereco</td>");
    print("<td><b>Cidade</td>");
    print("<td><b>Curso</td>");
    print("<td><b>Deletar</td><td><b>Alterar</td></tr>");

    while ($row = mysqli_fetch_array($alunos)) {
       $matricula = $row["matricula"];
       $nome = $row["nome"];
       $endereco = $row["endereco"];
       $cidade = $row["cidade"];
       $curso = $row["curso"];

       print("<tr><td>$matricula</td>");
       print("<td>$nome</td>");
       print("<td>$endereco</td>");
       print("<td>$cidade</td>");
       print("<td>$curso</td>");
       print("<td><a href='deletar.php?id=$matricula'>Deletar</a></td>");
       print("<td><a href='alterar.php?id=$matricula'>Alterar</a></td></tr>");
    }
    print("</table></center>");

    ?>
    <hr>
    <a href="inserir.php"><button>Inserir Aluno</button></a>
    <p><a href="../index.php">Voltar</a></p>
  </body>
</html>

