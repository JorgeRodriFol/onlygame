<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style/carritoStyle.css" />
  </head>
  <body>
    <div class="parent">
      <div class="menuTop">
        <a class="mainPage" href="./index.php" tabindex="1">
          <img src="../img/OnlyGamesLogo.png" alt="Pagina principal" />
        </a>
        <div class="breadcrumb">
          <a href="./index.php" tabindex="2">Inicio</a> &gt;
          <span>Carro</span>
        </div>
        <div class="search-container">
          <input type="text" placeholder="Buscar..." tabindex="3" />
          <button type="submit" tabindex="4">
            <img src="../img/lupa.png" alt="buscar" />
          </button>
        </div>
        <a class="carrito" href="./carrito.php" tabindex="5"
          ><img src="../img/carrito-de-compras.png" alt="carrito"
        /></a>
        <div class="log_in">
          <a href="./login.php">
            <h3>LOG IN</h3>
          </a>
        </div>
      </div>
      <div class="body">
        <div class="producto" tabindex="6">
          <img class="portada" src="../img/ZeldaTOTK.png" alt="" />
          <div class="informacion">
            <h1>ZELDA TEARS OF THE KINGDOM</h1>
            <h2>Categorias: ROL, Aventura...</h2>
          </div>
          <h2 class="precio">60.00€</h2>
        </div>
        <div class="producto" tabindex="7">
          <img class="portada" src="../img/ZeldaTOTK.png" alt="" />
          <div class="informacion">
            <h1>ZELDA TEARS OF THE KINGDOM</h1>
            <h2>Categorias: ROL, Aventura...</h2>
          </div>
          <h2 class="precio">60.00€</h2>
        </div>
        <div class="total">
          <h1>PRODUCTOS: XX</h1>
          <h1>TOTAL: XX.XX€</h1>
        </div>
      </div>
    </div>
  </body>
</html>
