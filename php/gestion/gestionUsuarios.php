<?php
$textos = explode("-", $_POST['texto']);

$con = new mysqli("localhost", "root", "", "onlygames");
$consulta = "SELECT * FROM Usuarios WHERE correo = '" . $textos[0] . "' AND clave = '" . $textos[1] . "'";
$result = $con->query($consulta);

if ($result->num_rows > 0) {
    // Obtener los nombres de los campos

    echo "Correcto";
} else {
    echo "No se encontraron registros en la base de datos.";
}

$con->close();
