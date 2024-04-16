<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../style/indexStyle.css" />
    <script src="../../scripts/muestraVideojuegos.js" defer></script>
  </head>
  <body>
    <div class="parent">
    <div class="modal-container" id="myModal">
      <div class="modal-content">
        <span class="close-modal" id="closeModal">&times;</span>
        <h2>Inicia sesión o create una cuenta para poder realizar tus compras.</h2>
      </div>
    </div>
      <div class="menuTop">
        <a class="mainPage" href="./index.php">
          <img src="../../img/OnlyGamesLogo.png" alt="Pagina principal" />
        </a>
        <div class="breadcrumb">
          <span><h3>Inicio</h3></span>
        </div>
        <div class="search-container">
          <input type="text" placeholder="Buscar..." />
          <button type="submit">
            <img src="../../img/lupa.png" alt="buscar" />
          </button>
        </div>
        <a class="carrito" href="./carrito.php"
          ><img src="../../../img/carrito-de-compras.png" alt="carrito"
        /></a>
        <div class="log_in">
          <a href="./login.php">
            <h3>LOG IN</h3>
          </a>
        </div>
      </div>
      <div class="menuLeft">
        <div class="plataformas">
          <ul>
            <p><strong>Plataformas</strong></p>
            <li>
              <input type="checkbox" name="plataforma" id="switch" />
              <label for="switch">Switch</label>
            </li>
            <li>
              <input type="checkbox" name="plataforma" id="ps5" />
              <label for="ps5">PS5</label>
            </li>
            <li>
              <input type="checkbox" name="plataforma" id="ps4" />
              <label for="ps4">PS4</label>
            </li>
            <li>
              <input type="checkbox" name="plataforma" id="xboxone" />
              <label for="xboxone">Xbox One</label>
            </li>
            <li>
              <input type="checkbox" name="plataforma" id="ps3" />
              <label for="ps3">PS3</label>
            </li>
            <li>
              <input type="checkbox" name="plataforma" id="xbox360" />
              <label for="xbox360">Xbox 360</label>
            </li>
          </ul>
        </div>
        <div class="genero">
          <ul>
            <p><strong>Género</strong></p>
            <li>
              <input type="checkbox" name="genero" id="terror" />
              <label for="terror">Terror</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="aventuras" />
              <label for="aventuras">Aventuras</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="rpg" />
              <label for="rpg">RPG</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="accion" />
              <label for="accion">Accion</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="supervivencia" />
              <label for="supervivencia">Supervivencia</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="fantasia" />
              <label for="fantasia">Fantasia</label>
            </li>
            <li>
              <input type="checkbox" name="genero" id="sandbox" />
              <label for="sandbox">Sandbox</label>
            </li>
          </ul>
        </div>
      </div>
      <div class="body">
        <h1>NOVEDADES</h1>
        <div class="categoria">
          <img class="flecha" src="../../img/anterior.png" alt="anterior" />
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
          <img class="flecha" src="../../img/flecha.png" alt="siguiente" />
        </div>
        <h1>MEJOR VALORADOS</h1>
        <div class="categoria">
          <img class="flecha" src="../../img/anterior.png" alt="anterior" />
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
          <img class="flecha" src="../../img/flecha.png" alt="siguiente" />
        </div>
      </div>
    </div>
  
  </body>
</html>
