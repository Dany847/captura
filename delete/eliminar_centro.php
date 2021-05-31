		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_centro=$_GET['del'];

			$conn->query("DELETE FROM `centro_trabajo` WHERE `id_centro`= '$id_centro'") or die(mysqli_error());
			header('location: ../vistas/centro/index.php');
		}