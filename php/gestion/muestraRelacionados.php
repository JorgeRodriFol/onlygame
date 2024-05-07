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
JOIN 
videojuegos_pataformas vp ON v.id_videojuego = vp.id_videojuego 
JOIN 
plataformas p ON vp.id_plataforma = p.id_plataforma 
WHERE 
v.id_videojuego = $id_juego
GROUP BY 
v.id_videojuego
";

$result = $con->query($consulta);
$relacion = mysqli_fetch_array($result);


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
    v.saga LIKE '" . $relacion[0] . "'
GROUP BY 
    v.id_videojuego;
";

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
