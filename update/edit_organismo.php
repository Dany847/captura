	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_frente = $_POST['id_frente'];
		$id_centro = $_POST['id_centro'];
		$nombre_organismo = $_POST['nombre_organismo'];
		$nombre_responsable = $_POST['nombre_responsable'];
		$apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];

			$conn->query("UPDATE `organismo` SET `id_frente` = '$id_frente', `id_centro` = '$id_centro', `nombre_organismo` = '$nombre_organismo', `nombre_responsable` = '$nombre_responsable', `apellido_paterno` = '$apellido_paterno', `apellido_materno` = '$apellido_materno' WHERE `id_organismo` = '$_REQUEST[id_organismo]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/organismo/index.php";
			</script>';
	}
?>