<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../style/productoStyle.css" />
  <script src="../../scripts/muestraDatos.js"></script>
</head>

<body>
  <div class="parent">
    <div class="menuTop">
      <a class="mainPage" href="./index.php">
        <img src="../../img/assets/OnlyGamesLogo.png" alt="Pagina principal" />
      </a>
      <div class="breadcrumb">
        <a href="./index.php">Inicio</a> &gt;
        <span>Zelda Tears Of The Kingdom</span>
      </div>
      <div class="search-container">
        <input type="text" placeholder="Buscar..." />
        <button type="submit">
          <img src="../../img/assets/lupa.png" alt="buscar" />
        </button>
      </div>
      <a class="carrito" href="./carrito.php"><img src="../../img/assets/carrito-de-compras.png" alt="carrito" /></a>
      <div class="log_in">
        <a href="./login.php">
          <h3>LOG IN</h3>
        </a>
      </div>
    </div>
    <div class="body">
      <div class="juego">
        <div class="portada">
          <img src="../img/ZeldaTOTK.png" alt="portada" id="portada" />
          <button type="button" class="addCarrito">
            Añadir al carrito
            <img src="../../img/assets/anadir-a-la-cesta.png" alt="" />
          </button>
        </div>
        <div class="detalles">
          <h1 id="titulo">ZELDA TEARS OF THE KINGDOM</h1>
          <h1 id="precio">60.00€</h1>
          <h4 id="categorias">Categorias: ROL, Aventuras, Fantasia</h4>
          <h4 id="plataformas">Plataformas: Switch</h4>
          <h4>Descripcion</h4>
          <div class="descripcion">
            <p>
              Sumérgete en un mundo vasto y lleno de magia, donde te
              embarcarás en una épica aventura para desentrañar los secretos
              del reino de Hyrule.
            </p>
          </div>
        </div>
      </div>
      <div class="recomendaciones">
        <h4>Saga</h4>
        <div class="saga">
          <div class="tarjeta">
            <a href="./producto.php">
              <img src="../../img/ZeldaTOTK.png" alt="" />
              <div class="info">
                <h4>Zelda Tears of the Kingdom</h4>
              </div>
            </a>
          </div>
        </div>
        <h4>Juegos Similares</h4>
        <div class="similares">
          <div class="tarjeta">
            <a href="./producto.php">
              <img src="../img/ZeldaTOTK.png" alt="" />
              <div class="info">
                <h4>Zelda Tears of the Kingdom</h4>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>