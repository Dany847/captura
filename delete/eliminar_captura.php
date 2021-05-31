		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_captura=$_GET['del'];

			$conn->query("DELETE FROM `captura` WHERE `id_captura`= '$id_captura'") or die(mysqli_error());
			header('location: ../vistas/captura/index.php');
		}