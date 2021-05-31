<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {

$id_miembro = $_POST['id_miembro'];
$id_actividad = $_POST['id_actividad'];
$url_cfacebook = $_POST['url_cfacebook'];
$url_ctwitter = $_POST['url_ctwitter'];

$query =  $conn->query("SELECT * FROM `captura` WHERE `id_actividad` = '$id_actividad' && `id_miembro` = '$id_miembro'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del captura ya existe");
 	window.location = "../vistas/captura.php";
 </script>';
 
	}else{
 $conn->query("INSERT INTO `captura` VALUES('', '$id_miembro', '$id_actividad', '$url_cfacebook', '$url_ctwitter' 'created_at')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/captura.php";
 </script>';
	}
}
 ?>

