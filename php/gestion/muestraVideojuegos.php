<?php
$input = $textos = $_POST['busqueda'];
$con = new mysqli("localhost", "root", "", "onlygames");
$consulta = "SELECT * FROM videojuegos WHERE titulo LIKE '%$input%'";
$result = $con->query($consulta);

if ($result->num_rows > 0) {
    // Obtener los nombres de los campos
    $registros = array();
    while ($fila = mysqli_fetch_assoc($result)) {
        $registros[] = $fila;
    }
    echo json_encode($registros);
} else {
    echo "No se encontraron registros en la base de datos.";
}

$con->close();
?>