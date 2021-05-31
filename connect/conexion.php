<?php
$conn = new mysqli('localhost', 'root', '', 'captura') or die(mysql_error());
if (!$conn) {
	die("Error: error de conexión");
}
 ?>