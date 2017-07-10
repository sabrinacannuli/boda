<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root'); //Edita tu usuario
define('DB_SERVER_PASSWORD', ''); //Edita tu contrase�a
define('DB_DATABASE', 'boda'); //Edita tu bd

$conexion = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD);
mysql_select_db(DB_DATABASE, $conexion);
?>