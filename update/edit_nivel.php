	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$nombre_nivel = $_POST['nombre_nivel'];
		$abrev_nivel = $_POST['abrev_nivel'];

		$conn->query("UPDATE `nivel` SET `nombre_nivel` = '$nombre_nivel', `abrev_nivel` = '$abrev_nivel' WHERE `id_nivel` = '$_REQUEST[id_nivel]' ") or die(mysql_error());
		echo ' <script type="text/javascript">
		alert("Datos Actualizado Exitosamente");
		window.location = "../vistas/nivel/index.php";
		</script>';
	}
?>