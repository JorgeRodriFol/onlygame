<?php
$con = new mysqli("localhost", "root", "", "onlygames");
if (isset($_POST['busqueda'])) {
    $input = $textos = $_POST['busqueda'];
    $consulta = "SELECT 
    v.id_videojuego,
    v.titulo, 
    v.precio, 
    v.imagen,
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias
FROM 
    videojuegos v 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria
WHERE 
    v.titulo LIKE '%$input%' 
GROUP BY 
    v.id_videojuego;
";
    $result = $con->query($consulta);

    if ($result->num_rows > 0) {
        // Obtener los nombres de los campos
        $registros = array();
        guardarElementos($registros, $result);
        echo json_encode($registros);
    } else {
        echo "No se encontraron registros en la base de datos.";
    }
} else if ($_POST['filtros']) {
    $filtros = $_POST['filtros'];
    $consulta = "SELECT 
    v.id_videojuego,
    v.titulo, 
    v.precio, 
    v.imagen,
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias
FROM 
    videojuegos v 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria
WHERE 
    c.nombre_categoria LIKE '%$filtros%' 
GROUP BY 
    v.id_videojuego;";
    $result = $con->query($consulta);

    if ($result->num_rows > 0) {
        // Obtener los nombres de los campos
        $registros = array();
        guardarElementos($registros, $result);
        echo json_encode($registros);
    } else {
        echo "No se encontraron registros en la base de datos.";
    }
}

$con->close();


function guardarElementos(&$registros, $result)
{
    while ($fila = mysqli_fetch_assoc($result)) {

        $registros[] = $fila;
    }
}
