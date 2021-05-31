	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$nombre_frente = $_POST['nombre_frente'];

		$conn->query("UPDATE `frente` SET `nombre_frente` = '$nombre_frente' WHERE `id_frente` = '$_REQUEST[id_frente]' ") or die(mysql_error());
		echo ' <script type="text/javascript">
		alert("Datos Actualizado Exitosamente");
		window.location = "../vistas/frente/index.php";
		</script>';
	}
?>