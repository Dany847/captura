<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {

$id_actividad = $_POST['id_actividad'];
$id_frente = $_POST['id_frente'];
$id_zona = $_POST['id_zona'];
$fecha_cierre = $_POST['fecha_cierre'];
$p_facebook = $_POST['p_facebook'];
$p_twitter = $_POST['p_twitter'];
$r_facebook = $_POST['r_facebook'];
$r_twitter = $_POST['r_twitter'];


 $conn->query("INSERT INTO `informe` VALUES('', '$id_actividad', '$id_frente', '$id_zona', '$fecha_cierre', '$p_facebook', '$p_twitter', '$r_facebook', '$r_twitter')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/informe/index.php";
 </script>';
	
}
 ?>

