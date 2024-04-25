<?php
$con = new mysqli("localhost", "root", "", "onlygames");
if (isset($_POST['registro'])) {
    $textos = explode("-", $_POST['registro']);

    $sql = "INSERT INTO usuarios (correo, nombre, clave) VALUES (?, ?, ?)";

    // Preparar la declaración
    $statement = $con->prepare($sql);

    // Vincular los parámetros con los valores
    $statement->bind_param("sss", $textos[0], $textos[1], $textos[2]);

    // Paso 3: Ejecutar la consulta SQL
    if ($statement->execute()) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar datos: " . $con->error;
    }

    // Paso 4: Cerrar la conexión
    $statement->close();
} else if (isset($_POST['login'])) {
    $textos = explode("-", $_POST['login']);

    $consulta = "SELECT * FROM usuarios WHERE correo = '" . $textos[0] . "' AND clave = '" . $textos[1] . "'";
    $result = $con->query($consulta);

    if ($result->num_rows > 0) {
        // Obtener los nombres de los campos

        echo "Correcto";
    } else {
        echo "No se encontraron registros en la base de datos.";
    }
}

$con->close();
