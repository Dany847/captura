	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$nombre_actividad = $_POST['nombre_actividad'];
		$url_facebook = $_POST['url_facebook'];
		$url_twitter = $_POST['url_twitter'];
		$fecha = $_POST['fecha'];

			$conn->query("UPDATE `actividad` SET `nombre_actividad` = '$nombre_actividad', `url_facebook` = '$url_facebook', `url_twitter` = '$url_twitter',
			`fecha` = '$fecha' WHERE `id_actividad` = '$_REQUEST[id_actividad]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/actividad/index.php";
			</script>';
    	}
?>