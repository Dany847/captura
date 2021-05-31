<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {
$nombre_nivel = $_POST['nombre_nivel'];
$abrev_nivel = $_POST['abrev_nivel'];
	$query =  $conn->query("SELECT * FROM `nivel` WHERE `nombre_nivel` = '$nombre_nivel'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del nivel ya existe");
 	window.location = "../vistas/nivel/index.php";
 </script>';
	}else{
  $conn->query("INSERT INTO `nivel` VALUES('', '$nombre_nivel', '$abrev_nivel')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/nivel/index.php";
 </script>';
	}
}
 ?>