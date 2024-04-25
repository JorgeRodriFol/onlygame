<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../style/loginStyle.css" />
</head>

<body>
  <div class="menuTop">
    <a class="mainPage" href="./index.php" tabindex="1">
      <img src="../../img/OnlyGamesLogo.png" alt="Pagina principal" />
    </a>
    <div class="breadcrumb">
      <a href="./index.php" tabindex="2">Inicio</a> &gt;
      <span>Log In</span>
    </div>
    <div class="search-container">
      <input type="text" placeholder="Buscar..." tabindex="3" />
      <button type="submit" tabindex="4">
        <img src="../img/lupa.png" alt="buscar" />
      </button>
    </div>
    <a class="carrito" href="./carrito.php" tabindex="5"><img src="../img/carrito-de-compras.png" alt="carrito" /></a>
  </div>
  <div class="body">
    <form action="./index.php" method="get">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre" />
      <label for="correo">Correo</label>
      <input type="text" name="correo" id="correo" />
      <label for="password">Contraseña</label>
      <input type="text" name="password" id="password" />
      <label for="passwordRepeat">Repita la contraseña</label>
      <input type="text" name="passwordRepeat" id="passwordRepeat" />
      <div>
        <button type="submit">Cancelar</button>
        <button type="submit">Aceptar</button>
      </div>
    </form>
    <img src="../img/OnlyGamesLogo.png" alt="" />
  </div>
</body>

</html>