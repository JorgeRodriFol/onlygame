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
    $statement->close();
} else if ($funcion == 'mostrar') {
    $usuario = $_POST['usuario'];
    $consulta = "SELECT 
    v.titulo, 
    v.precio, 
    v.imagen,
    GROUP_CONCAT(DISTINCT c.nombre_categoria SEPARATOR ', ') AS categorias
FROM 
    carrito ca
JOIN 
    videojuegos v ON ca.id_videojuego = v.id_videojuego 
JOIN 
    videojuegos_categorias vc ON v.id_videojuego = vc.id_videojuego 
JOIN 
    categorias c ON vc.id_categoria = c.id_categoria 
WHERE
    ca.usuario = '$usuario'
GROUP BY 
    v.id_videojuego
";
    $result = $con->query($consulta);

    if ($result->num_rows > 0) {
        $registros = array();
        guardarElementos($registros, $result);
        echo json_encode($registros);
    } else {
        echo json_encode("No se encontro el videojuego");
    }
} else if ($funcion == 'comprar') {
    $usuario = $_POST['usuario'];
    $consulta = "SELECT 
    ca.id_videojuego
    FROM 
        carrito ca
    WHERE
        ca.usuario = '$usuario'
    ";
    $result = $con->query($consulta);

    if ($result->num_rows > 0) {
        $registros = array();
        guardarElementos($registros, $result);
        $fecha = date("Y-m-d");
        $sql = "INSERT INTO compras (fecha, usuario) VALUES (?, ?)";

        // Preparar la declaración
        $statement = $con->prepare($sql);

        // Vincular los parámetros con los valores
        $statement->bind_param("ds", $fecha, $usuario);
        if ($statement->execute()) {
            $ultimo_id = $mysqli->insert_id;
            for ($i = 0; $i < sizeof($registros); $i++) {
                $sql = "INSERT INTO compras_videojuegos (id_compra, id_videojuego) VALUES (?, ?)";
                $statement = $con->prepare($sql);


                // Vincular los parámetros con los valores
                $statement->bind_param("ii", $ultimo_id, $registros[$i]['id_videojuego']);
                if ($statement->execute()) {
                    echo "200";
                } else {
                    echo "Error al insertar datos: " . $con->error;
                }
            }
        } else {
            echo "Error al insertar datos: " . $con->error;
        }
    } else {
        echo json_encode("No se encontro el videojuego");
    }
}

$con->close();


function guardarElementos(&$registros, $result)
{
    while ($fila = mysqli_fetch_assoc($result)) {

        $registros[] = $fila;
    }
}
