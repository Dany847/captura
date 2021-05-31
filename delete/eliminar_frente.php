		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_frente=$_GET['del'];

			$conn->query("DELETE FROM `frente` WHERE `id_frente`= '$id_frente'") or die(mysqli_error());
			header('location: ../vistas/frente/index.php');
		}