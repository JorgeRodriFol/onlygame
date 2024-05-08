<?php
$con = new mysqli("localhost", "root", "", "onlygames");
if (isset($_POST['busqueda'])) {
    $input = $textos = $_POST['busqueda'];
    $consulta = "SELECT 
    v.id_videojuego,
    v.titulo, 
    v.precio, 
    v.imagen,
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias, 
    GROUP_CONCAT(DISTINCT p.nombre_plataforma SEPARATOR ', ') AS plataformas 
FROM 
    videojuegos v 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria 
JOIN 
    videojuegos_pataformas vp ON v.id_videojuego = vp.id_videojuego 
JOIN 
    plataformas p ON vp.id_plataforma = p.id_plataforma 
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
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias, 
    GROUP_CONCAT(DISTINCT p.nombre_plataforma SEPARATOR ', ') AS plataformas 
FROM 
    videojuegos v 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria 
JOIN 
    videojuegos_pataformas vp ON v.id_videojuego = vp.id_videojuego 
JOIN 
    plataformas p ON vp.id_plataforma = p.id_plataforma  WHERE c.nombre_categoria = '$filtros';";
    $result = $con->query($consulta);
    echo $result->num_rows;

    if ($result->num_rows > 0) {
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
