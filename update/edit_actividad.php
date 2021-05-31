	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {
		$tipo = $_POST['tipo'];
		$nombre = $_POST['nombre'];
		$a_facebook = $_POST['a_facebook'];
		$a_twitter = $_POST['a_twitter'];
		$fecha = $_POST['fecha'];
		$cumplimiento = $_POST['cumplimiento'];
		$query =  $conn->query("SELECT * FROM `actividad` WHERE `tipo` = '$tipo' && `nombre` = '$nombre'") or die(mysql_error());
		$q = $query->num_rows;
		if ($q == 1) {
			echo ' <script type="text/javascript">
			alert("Actividad ya existe");
			window.location = "../vistas/actividad.php";
			</script>';
		}else{
			$conn->query("UPDATE `actividad` SET `tipo` = '$tipo', `nombre` = '$nombre', `a_facebook` = '$a_facebook', `a_twitter` = '$a_twitter',
			`fecha` = '$fecha', `cumplimiento` = '$cumplimiento' WHERE `id_actividad` = '$_REQUEST[id_actividad]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/actividad.php";
			</script>';
		}
	}
?>