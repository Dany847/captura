		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_nivel=$_GET['del'];

			$conn->query("DELETE FROM `nivel` WHERE `id_nivel`= '$id_nivel'") or die(mysqli_error());
			header('location: ../vistas/nivel/index.php');
		}