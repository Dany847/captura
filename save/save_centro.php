<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {
$id_zona = $_POST['id_zona'];
$nombre_centro = $_POST['nombre_centro'];
$nombre_responsable = $_POST['nombre_responsable'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
	$query =  $conn->query("SELECT * FROM `centro_trabajo` WHERE `nombre_centro` = '$nombre_centro' && `nombre_responsable` = '$nombre_responsable'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del centro ya existe");
 	window.location = "../vistas/centro.php";
 </script>';
	}else{
  $conn->query("INSERT INTO `centro_trabajo` VALUES('', '$id_zona', '$nombre_centro', '$nombre_responsable', '$apellido_paterno', '$apellido_materno')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/centro.php";
 </script>';
	}
}
 ?>
