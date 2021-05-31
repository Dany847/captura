<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {

$nombre_actividad = $_POST['nombre_actividad'];
$url_facebook = $_POST['url_facebook'];
$url_twitter = $_POST['url_twitter'];
$fecha = $_POST['fecha'];

$query =  $conn->query("SELECT * FROM `actividad` WHERE `nombre_actividad` = '$nombre_actividad' && `fecha` = '$fecha'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del actividad ya existe");
 	window.location = "../vistas/actividad/index.php";
 </script>';
 
	}else{
 $conn->query("INSERT INTO `actividad` VALUES('', '$nombre_actividad', '$url_facebook', '$url_twitter', '$fecha')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/actividad/index.php";
 </script>';
	}
}
 ?>
