<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {

$id_nivel = $_POST['id_nivel'];
$numero_zona = $_POST['numero_zona'];
$nombre_zona = $_POST['nombre_zona'];
$nombre_responsable = $_POST['nombre_responsable'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];

	$query =  $conn->query("SELECT * FROM `zona` WHERE `numero_zona` = '$numero_zona' && `nombre_zona` = '$nombre_zona'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del zona ya existe");
 	window.location = "../vistas/zona/index.php";
 </script>';
	}else{
  $conn->query("INSERT INTO `zona` VALUES('', '$id_nivel', '$numero_zona', '$nombre_zona', '$nombre_responsable', '$apellido_paterno', '$apellido_materno')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/zona/index.php";
 </script>';
	}
}
 ?>
