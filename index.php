<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <title>Locadora</title>
  </head>
  <body>
    <header>
      <h1>Locadora</h1>
    </header>
    <div class="main-container">
      <div class="center">
        <div class="pages">
          <a href="cliente/mostra.php">Clientes</a>
          <a href="pedido/mostra.php">Pedidos</a>
          <a href="filme/mostra.php">Filmes</a>
        </div>
      </div>
    </div>
  </body>
</html>

<style>
header {
  margin-left: 30px;
  margin-top: 30px;
}

.main-container {
  margin: 80px 3%;
}

div {
  text-align: center;
}

.center {
  width: 80%;
  margin: 0 auto;
  align-items: center;
}

.pages {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.pages a {
  padding-bottom: 32px;
  display: inline-flex;
  align-items: center;
  cursor: pointer;
  text-decoration: underline;
  font-size: 24px;
  font-weight: bold;
}
</style>