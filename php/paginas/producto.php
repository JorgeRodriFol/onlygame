<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../style/productoStyle.css" />
  <script src="../../scripts/muestraDatos.js" defer></script>
  <script src="../../scripts/gestionUsuarios.js" defer></script>
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
      <div id="myModal" class="modal">
        <!-- Contenido del Modal -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>Producto añadido.</p>
        </div>
      </div>
      <div class="juego">
        <div class="portada">
          <img src="../img/ZeldaTOTK.png" alt="portada" id="portada" />
          <button type="button" class="addCarrito" onclick="addCarrito()">
            Añadir al carrito
            <img src="../../img/assets/anadir-a-la-cesta.png" alt="" />
          </button>
        </div>
        <div class="detalles">
          <h1 id="titulo">ZELDA TEARS OF THE KINGDOM</h1>
          <h1 id="precio">60.00€</h1>
          <h4 id="categorias">Categorias: ROL, Aventuras, Fantasia</h4>
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
        <div class="arrows">
          <button id="left" style="background-color:transparent; border:none">
            <svg  class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
          </button>
          <button id="right" style="background-color:transparent; border:none">
            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>