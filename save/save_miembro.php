<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {
$id_organismo = $_POST['id_organismo'];
$id_nivel = $_POST['id_nivel'];
$id_frente = $_POST['id_frente'];
$nombre = $_POST['nombre'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$facebook_link = $_POST['facebook_link'];
$twitter_link = $_POST['twitter_link'];

$query =  $conn->query("SELECT * FROM `miembro` WHERE `nombre` = '$nombre' && `apellido_paterno` = '$apellido_paterno'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del miembro ya existe");
 	window.location = "../vistas/miembro/index.php";
 </script>';
 
	}else{
 $conn->query("INSERT INTO `miembro` VALUES('', '$id_organismo', '$id_nivel', '$id_frente', '$nombre', '$apellido_paterno', '$apellido_materno', '$facebook_link', '$twitter_link')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/miembro/index.php";
 </script>';
	}
}
 ?>

