		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_miembro=$_GET['del'];

			$conn->query("DELETE FROM `miembro` WHERE `id_miembro`= '$id_miembro'") or die(mysqli_error());
			header('location: ../vistas/miembro/index.php');
		}