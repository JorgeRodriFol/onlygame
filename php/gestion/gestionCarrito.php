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
    ca.id_videojuego,
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
        $sql = "INSERT INTO compras (usuario) VALUES ('$usuario')";

        if ($con->query($sql) === TRUE) {
            $ultimo_id = $con->insert_id;
            $insertado = 0;
            for ($i = 0; $i < sizeof($registros); $i++) {
                $sql = "INSERT INTO compras_videojuegos (id_compra, id_videojuego) VALUES (?, ?)";
                $statement = $con->prepare($sql);


                // Vincular los parámetros con los valores
                $statement->bind_param("ii", $ultimo_id, $registros[$i]['id_videojuego']);
                if ($statement->execute()) {

                    $insertado++;
                } else {
                    echo "Error al insertar datos: " . $con->error;
                }
            }
            if ($insertado == $result->num_rows){
                $delete = "DELETE FROM Carrito WHERE usuario = '$usuario'";
                $result = $con->query($delete);
                if ($result) {
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
} else if ($funcion == 'borrar') {
    $usuario = $_POST['usuario'];
    $videojuego = $_POST['videojuego'];

    $delete = "DELETE FROM Carrito WHERE usuario = '$usuario' AND id_videojuego = $videojuego";
    $result = $con->query($delete);
    if ($result) {
        echo "Producto eliminado";
    } else {
        echo "Error al borrar";
    }
}

$con->close();


function guardarElementos(&$registros, $result)
{
    while ($fila = mysqli_fetch_assoc($result)) {

        $registros[] = $fila;
    }
}
