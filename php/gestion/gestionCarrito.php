<?php
$con = new mysqli("localhost", "root", "", "onlygames");
$funcion = $_POST['funcion'];
if ($funcion == 'insertar') {
    $videojuegoID = $_POST['videojuegoID'];
    $usuario = $_POST['usuario'];
    $sql = "INSERT INTO carrito (id_videojuego, usuario) VALUES (?, ?)";

    // Preparar la declaración
    $statement = $con->prepare($sql);

    // Vincular los parámetros con los valores
    $statement->bind_param("is", $videojuegoID, $usuario);
    if ($statement->execute()) {
        echo "200";
    } else {
        echo "Error al insertar datos: " . $con->error;
    }

    // Paso 4: Cerrar la conexión
}
$statement->close();
