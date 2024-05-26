<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/usuarioStyle.css">
    <script src="../../scripts/gestionUsuarios.js" defer></script>
</head>

<body>
    <div class="parent">
        <div class="menuTop">
            <a class="mainPage" href="./index.php">
                <img src="../../img/assets/OnlyGamesLogo.png" alt="Pagina principal" />
            </a>
            <div class="breadcrumb">
                <a href="./index.php" tabindex="2">Inicio</a> &gt;
                <span>Mi Cuenta</span>
            </div>
            <div class="search-container">
                <input type="text" placeholder="Buscar..." />
                <button type="submit">
                    <img src="../../img/assets/lupa.png" alt="buscar" />
                </button>
            </div>
            <a class="carrito" href="./carrito.php"><img src="../../img/assets/carrito-de-compras.png" alt="carrito" /></a>
        </div>
        <div class="body">
            <div class="usuario">
                <img src="../../img/usuarios/sin_img.png" alt="">
                <div class="datos">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo">
                </div>
            </div>
        </div>
    </div>
</body>

</html>