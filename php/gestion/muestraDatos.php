<?php
$videojuegoID = (int)$_POST['videojuegoID'];
$con = new mysqli("localhost", "root", "", "onlygames");
$consulta = "SELECT 
    v.titulo, 
    v.precio, 
    v.imagen,
    v.descripcion,
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias
FROM 
    videojuegos v 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria 
WHERE 
    v.id_videojuego = $videojuegoID
GROUP BY 
    v.id_videojuego;
";

$result = $con->query($consulta);

if ($result->num_rows > 0) {
    echo json_encode(mysqli_fetch_assoc($result));
} else {
    echo json_encode("No se encontro el videojuego");
}
