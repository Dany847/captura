<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {
$nombre_frente = $_POST['nombre_frente'];
	$query =  $conn->query("SELECT * FROM `frente` WHERE `nombre_frente` = '$nombre_frente'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del frente ya existe");
 	window.location = "../vistas/frente.php";
 </script>';
	}else{
  $conn->query("INSERT INTO `frente` VALUES('', '$nombre_frente')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/frente.php";
 </script>';
	}
}
 ?>