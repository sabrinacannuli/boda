<?php
$service = $_GET['nombre'];
mysql_query("UPDATE invitados SET confirmacion = 'si' where nombrecompleto =".$service, $conexion);
?>