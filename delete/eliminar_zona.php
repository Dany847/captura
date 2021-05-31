		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_zona=$_GET['del'];

			$conn->query("DELETE FROM `zona` WHERE `id_zona`= '$id_zona'") or die(mysqli_error());
			header('location: ../vistas/zona/index.php');
		}