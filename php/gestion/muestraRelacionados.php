<?php
$id_juego = $_POST['videojuegoID'];
$con = new mysqli("localhost", "root", "", "onlygames");
$consulta = "SELECT 
v.saga,
GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias
FROM 
videojuegos v 
JOIN 
videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
categorias c ON vc.id_categoria = c.id_categoria
WHERE 
v.id_videojuego = $id_juego
GROUP BY 
v.id_videojuego
";

$result = $con->query($consulta);
$relacion = $filtros = explode(", ", mysqli_fetch_array($result)[1]);



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
    c.nombre_categoria IN (";
for ($i = 0; $i < count($relacion); $i++) {
    $consulta .= "'" . $relacion[$i] . "'";
    if ($i < count($relacion) - 1) {
        $consulta .= ", ";
    }
}
$consulta .= ")
GROUP BY 
    v.id_videojuego;";
$result = $con->query($consulta);

$registros = array();
guardarElementos($registros, $result);
echo json_encode($registros);

function guardarElementos(&$registros, $result)
{
    while ($fila = mysqli_fetch_assoc($result)) {

        $registros[] = $fila;
    }
}
