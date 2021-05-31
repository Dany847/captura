	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {
		$nombre = $_POST['nombre'];
		$responsable = $_POST['responsable'];
		$query =  $conn->query("SELECT * FROM `zonas` WHERE `nombre` = '$nombre' && `responsable` = '$responsable'") or die(mysql_error());
		$q = $query->num_rows;
		if ($q == 1) {
			echo ' <script type="text/javascript">
			alert("Nombre del zona ya existe");
			window.location = "../vistas/zona.php";
			</script>';
		}else{
			$conn->query("UPDATE `zonas` SET `nombre` = '$nombre', `responsable` = '$responsable' WHERE `id_zona` = '$_REQUEST[id_zona]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/zona.php";
			</script>';
		}
	}
?>