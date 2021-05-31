<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {
$id_frente = $_POST['id_frente'];
$id_centro = $_POST['id_centro'];	
$nombre_organismo = $_POST['nombre_organismo'];
$nombre_responsable = $_POST['nombre_responsable'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];


	$query =  $conn->query("SELECT * FROM `organismo` WHERE `nombre_responsable` = '$nombre_responsable' && `nombre_organismo` = '$nombre_organismo'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del organismo ya existe");
 	window.location = "../vistas/organismo.php";
 </script>';
	}else{
  $conn->query("INSERT INTO `organismo` VALUES('', '$id_frente', '$id_centro', '$nombre_organismo', '$nombre_responsable', '$apellido_paterno', '$apellido_materno')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/organismo.php";
 </script>';
	}
}
 ?>
