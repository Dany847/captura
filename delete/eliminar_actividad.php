		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_actividad=$_GET['del'];

			$conn->query("DELETE FROM `actividad` WHERE `id_actividad`= '$id_actividad'") or die(mysqli_error());
			header('location: ../vistas/actividad/index.php');
		}