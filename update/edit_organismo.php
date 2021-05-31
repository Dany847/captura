	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_zona = $_POST['id_zona'];
		$nombre_org = $_POST['nombre_org'];
		$responsable = $_POST['responsable'];

		$query =  $conn->query("SELECT * FROM `organismo` WHERE `nombre_org` = '$nombre_org' && `responsable` = '$responsable'") or die(mysql_error());
		$q = $query->num_rows;
		if ($q == 1) {
			echo ' <script type="text/javascript">
			alert("Organismo ya existe");
			window.location = "../vistas/organismo.php";
			</script>';
		}else{
			$conn->query("UPDATE `organismo` SET `id_zona` = '$id_zona', `nombre_org` = '$nombre_org', `responsable` = '$responsable' WHERE `id_organismo` = '$_REQUEST[id_organismo]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/organismo.php";
			</script>';
		}
	}
?>