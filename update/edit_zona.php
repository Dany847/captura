	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_nivel = $_POST['id_nivel'];
		$numero_zona = $_POST['numero_zona'];
		$nombre_zona = $_POST['nombre_zona'];
		$nombre_responsable = $_POST['nombre_responsable'];
		$apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];

		$conn->query("UPDATE `zona` SET `id_nivel` = '$id_nivel', `numero_zona` = '$numero_zona', `nombre_zona` = '$nombre_zona', `nombre_responsable` = '$nombre_responsable', `apellido_paterno` = '$apellido_paterno', `apellido_materno` = '$apellido_materno' WHERE `id_zona` = '$_REQUEST[id_zona]' ") or die(mysql_error());
		echo ' <script type="text/javascript">
		alert("Datos Actualizado Exitosamente");
		window.location = "../vistas/zona/index.php";
		</script>';
	}
?>