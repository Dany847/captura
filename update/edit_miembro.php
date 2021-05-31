<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_organismo = $_POST['id_organismo'];
		$id_nivel = $_POST['id_nivel'];
		$id_frente = $_POST['id_frente'];
		$nombre = $_POST['nombre'];
		$apellido_paterno = $_POST['apellido_paterno'];
		$apellido_materno = $_POST['apellido_materno'];
		$facebook_link = $_POST['facebook_link'];
		$twitter_link = $_POST['twitter_link'];

			$conn->query("UPDATE `miembro` SET `id_organismo` = '$id_organismo', `id_nivel` = '$id_nivel', `id_frente` = '$id_frente', `nombre` = '$nombre', `apellido_paterno` = '$apellido_paterno', `apellido_materno` = '$apellido_materno', `facebook_link` = '$facebook_link', `twitter_link` = '$twitter_link' WHERE `id_miembro` = '$_REQUEST[id_miembro]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/miembro/index.php";
			</script>';
	}
?>