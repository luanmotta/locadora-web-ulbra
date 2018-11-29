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

    $queryPedidos = "
    SELECT c.nome, p.situacao, p.pedidoId  FROM 
	pedido p inner join 
    cliente c on p.clienteId = c.clienteId LIMIT 10
    ;";

    $ok = conecta_bd() or die ("Nao foi possivel conectar-se ao servidor.");
    $pedidos = mysqli_query($ok, $queryPedidos) or die ("Nao foi possivel consultar pedidos.");
    ?>
  <h2>Pedidos</h2>
  <div style="display: flex; justify-content: flex-end">
    <label style="float: right; margin-right: 5px" for="pesquisar">Pesquisar</label>
    <input style="float: right" type="text" name="pesquisar" id="pesquisar">
    <input id="btn_pesquisar" style="float: right; margin-left: 5px" type="button" value="Pesquisar">
  </div>
  <div style="display: flex; justify-content: flex-end; margin-top: 5px">
    <label style="float: right; margin-right: 5px" for="pesquisar">Filtrar por:</label>
    <select name="filtro" id="filtro">
      <option value="-1">Selecione um filtro</option>
      <option value="0">Pendente</option>
      <option value="1">Pago</option>
    </select>
  </div>

  <table id="table-result" bordercolor='red'>
    <th><b>Cliente</th>
    <th><b>Situacao</th>
    <th><b>Acoes</th>


    <?php 
    while ($row = mysqli_fetch_array($pedidos)) {
       $nome = $row["nome"];
       $situacao = $row["situacao"];
       $pedidoId = $row["pedidoId"];
        ?>
    <tr>
      <td>
        <?php echo($nome) ?>
      </td>
      <td>
        <?php if ($situacao == 0){
         echo("Pendente");
        }else{
          echo("Pago");
         } ?>
      </td>
      <td><a href='deletar.php?pedidoId=<?php echo($pedidoId) ?>'>Deletar</a></td>
      <td><a href='finalizar.php?pedidoId=<?php echo($pedidoId) ?>'>Visualizar</a></td>
    </tr>
    <?php 
    }
    ?>
  </table>
  <hr>
  <a href="inserir.php"><button>Criar pedido</button></a>
  <p><a href="../index.php">Voltar</a></p>
</body>
<script>
  function pesquisar() {
    const txt = document.getElementById("pesquisar").value;
    const situacao = document.getElementById("filtro").value;
    const url = `http://localhost:8080/Locadora/pedido/pesquisar.php?pesquisar=${txt}&situacao=${situacao}`;

    window.fetch(url)
      .then(res => res.json())
      .then(data => {
        console.log(data);
        const tbody = document.querySelector("#table-result tbody");
        tbody.innerHTML = "";
        const html = [];
        html.push("<tr> \
                    <th><b>Cliente</th> \
                    <th><b>Situacao</th> \
                    <th><b>Acoes</th> \
                  </tr>");
        data.forEach(element => {
          html.push(`<tr>`);
          html.push(`<td>${element.nome}</td>`);
          html.push(`<td>${element.situacao == 0 ? "Pendente" : "Pago"}</td>`);
          html.push(`<td><a href='deletar.php?pedidoId=${element.pedidoId}'>Deletar</a></td>`);
          html.push(`<td><a href='finalizar.php?pedidoId=${element.pedidoId}'>Alterar</a></td>`)
          html.push(`</tr>`);
        });
        tbody.innerHTML = html.join("");
      })
      .catch(err => {
        const tbody = document.querySelector("#table-result tbody");
        tbody.innerHTML = "";
        const html = [];
        html.push("<tr> \
                    <th><b>Cliente</th> \
                    <th><b>Situacao</th> \
                    <th><b>Acoes</th> \
                  </tr>");
        tbody.innerHTML = html.join("");
      });
  }

  window.addEventListener('load', function () {
    const btn = document.getElementById("btn_pesquisar");
    btn.addEventListener("click", pesquisar);
  })


</script>

</html>