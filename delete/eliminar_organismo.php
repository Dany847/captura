		<?php
		require_once '../connect/conexion.php';

		if (isset($_GET['del'])) 
		{
			$id_organismo=$_GET['del'];

			$conn->query("DELETE FROM `organismo` WHERE `id_organismo`= '$id_organismo'") or die(mysqli_error());
			header('location: ../vistas/organismo/index.php');
		}