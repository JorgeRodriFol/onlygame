<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../style/indexStyle.css" />
  <script src="../../scripts/muestraVideojuegos.js" defer></script>
  <script src="../../scripts/gestionUsuarios.js" defer></script>
</head>

<body>
  <div class="parent">
    <div class="menuTop">
      <a class="mainPage" href="./index.php">
        <img src="../../img/assets/OnlyGamesLogo.png" alt="Pagina principal" />
      </a>
      <div class="breadcrumb">
        <span>
          <h3>Inicio</h3>
        </span>
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
    <div class="menuLeft">
      <div class="genero">
        <ul>
          <p><strong>Género</strong></p>
          <li>
            <input type="checkbox" name="genero" id="terror" value="terror" />
            <label for="terror">Terror</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="aventuras" value="aventuras" />
            <label for="aventuras">Aventuras</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="rpg" value="rpg" />
            <label for="rpg">RPG</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="accion" value="accion" />
            <label for="accion">Accion</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="supervivencia" value="supervivencia" />
            <label for="supervivencia">Supervivencia</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="fantasia" value="fantasia" />
            <label for="fantasia">Fantasia</label>
          </li>
          <li>
            <input type="checkbox" name="genero" id="sandbox" value="sandbox" />
            <label for="sandbox">Sandbox</label>
          </li>
        </ul>
      </div>
    </div>
    <div class="body">
      <div id="myModal" class="modal">
        <!-- Contenido del Modal -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>Debes iniciar sesión para ver el carrito.</p>
        </div>
      </div>
      <div class="tarjeta">
        <a href="./producto.php">
          <img src="../../img/ZeldaTOTK.png" alt="" />
          <div class="info">
            <h4>Zelda Tears of the Kingdom</h4>
            <h4>60.00€</h4>
            <p>Categorias: RPG, Aventuras...</p>
            <p>Switch</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>

</html>