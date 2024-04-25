<?php
$con = new mysqli("localhost", "root", "", "onlygames");
if (isset($_POST['busqueda'])) {
    $input = $textos = $_POST['busqueda'];
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
} else if ($_POST['filtros']) {
    $filtros = $_POST['filtros'];
    $consulta = "SELECT DISTINCT  v.* FROM videojuegos v JOIN videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego JOIN categorias c ON vc.id_categoria = c.id_categoria WHERE c.nombre_categoria LIKE '%$filtros%';";
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
}

$con->close();
