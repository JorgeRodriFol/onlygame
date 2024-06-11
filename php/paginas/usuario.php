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
            <a class="carrito" href="./carrito.php"><img src="../../img/assets/carrito-de-compras.png" alt="carrito" /></a>
        </div>
        <div class="body">
            <div class="usuario">
                <img src="../../img/usuarios/<?php
                    echo $_COOKIE['imgCliente'];
                    ?>" alt="">
                <div class="datos">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php
                    echo $_COOKIE['nombreCliente'];
                    ?>">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo" value="<?php
                    echo $_COOKIE['correoCliente'];
                    ?>">
                    <button class="button" onclick="cambiar()">GUARDAR CAMBIOS</button>
                    <button class="button" onclick="logout()">LOG OUT</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>