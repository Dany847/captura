	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_zona = $_POST['id_zona'];
		$nombre_centro = $_POST['nombre_centro'];
		$nombre_responsable = $_POST['nombre_responsable'];
		$apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];

		$conn->query("UPDATE `centro_trabajo` SET `id_zona` = '$id_zona', `nombre_centro` = '$nombre_centro', `nombre_responsable` = '$nombre_responsable', `apellido_paterno` = '$apellido_paterno', `apellido_materno` = '$apellido_materno' WHERE `id_centro` = '$_REQUEST[id_centro]' ") or die(mysql_error());
		echo ' <script type="text/javascript">
		alert("Datos Actualizado Exitosamente");
		window.location = "../vistas/centro/index.php";
		</script>';
	}
?>