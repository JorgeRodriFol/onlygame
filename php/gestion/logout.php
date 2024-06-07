<?php
// Borrar cookies estableciendo la fecha de expiración en el pasado
setcookie("nombreCliente", "", time() - 3600, "/");
setcookie("imgCliente", "", time() - 3600, "/");
setcookie("correoCliente", "", time() - 3600, "/");
exit; // Asegúrate de detener la ejecución del script después de redirigir
?>
