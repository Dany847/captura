	<?php 
	require_once '../connect/conexion.php';
	if (ISSET($_POST['editar'])) {

		$id_organismo = $_POST['id_organismo'];
		$nombremiembro = $_POST['nombremiembro'];
		$c_facebook = $_POST['c_facebook'];
		$c_twitter = $_POST['c_twitter'];

		$query =  $conn->query("SELECT * FROM `miembro` WHERE `id_organismo` = '$id_organismo' && `nombremiembro` = '$nombremiembro'") or die(mysql_error());
		$q = $query->num_rows;
		if ($q == 1) {
			echo ' <script type="text/javascript">
			alert("Organismo ya existe");
			window.location = "../vistas/miembro.php";
			</script>';
		}else{
			$conn->query("UPDATE `miembro` SET `id_organismo` = '$id_organismo', `nombremiembro` = '$nombremiembro', `c_facebook` = '$c_facebook', `c_twitter` = '$c_twitter' WHERE `idmiembros` = '$_REQUEST[idmiembros]' ") or die(mysql_error());
			echo ' <script type="text/javascript">
			alert("Datos Actualizado Exitosamente");
			window.location = "../vistas/miembro.php";
			</script>';
		}
	}
?>