<!DOCTYPE html>
<html>
<?php
require_once '../connect/conexion.php';
include('head.php');
?>
<body class="theme-red ls-closed">
	<?php
	include('header.php');
	?>
	<section class="content">
		<div class="container-fluid">
			<div class="row clearfix">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="card">
						<div class="body">
							<div class="block-header">
								<h2>INICIO</h2>
							</div>
							<div class="row">
								<a href="frente/create_frente.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-pink hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">inventory</i>
										</div>
										<div class="content">
											<div class="text">NUEVO FRENTE</div>
										</div>
									</div>
								</div>
								</a>
								<a href="frente">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-blue hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">apps</i>
										</div>
										<div class="content">
											<div class="text">VER FRENTES</div>
										</div>
									</div>
								</div>
								</a>
								<a href="nivel/create_nivel.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-amber hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">trending_up</i>
										</div>
										<div class="content">
											<div class="text">NUEVO NIVEL</div>
										</div>
									</div>
								</div>
								</a>
								<a href="nivel">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-cyan hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">grading</i>
										</div>
										<div class="content">
											<div class="text">VER NIVELES</div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="row">
								<a href="zona/create_zona.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-red hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">flag</i>
										</div>
										<div class="content">
											<div class="text">NUEVA ZONA</div>
										</div>
									</div>
								</div>
								</a>
								<a href="zona">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-indigo hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">toc</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR ZONAS</div>
										</div>
									</div>
								</div>
								</a>
								<a href="centro/create_centro.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-grey hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">location_city</i>
										</div>
										<div class="content">
											<div class="text">NUEVO CENTERO</div>
										</div>
									</div>
								</div>
								</a>
								<a href="centro">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-deep-purple hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">domain</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR CENTROS</div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="row">
								<a href="organismo/create_organismo.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-teal hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">reduce_capacity</i>
										</div>
										<div class="content">
											<div class="text">NUEVO ORGANISMO</div>
										</div>
									</div>
								</div>
								</a>
								<a href="organismo">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-green hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">grading</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR ORGANISMOS</div>
										</div>
									</div>
								</div>
								</a>
								<a href="miembro/create_miembro.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-light-green hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">person_add</i>
										</div>
										<div class="content">
											<div class="text">NUEVO MIEMBRO</div>
										</div>
									</div>
								</div>
								</a>
								<a href="miembro">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-lime hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">groups</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR MIEMBROS</div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="row">
								<a href="actividad/create_actividad.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-orange hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">real_estate_agent</i>
										</div>
										<div class="content">
											<div class="text">NUEVA ACTIVIDAD</div>
										</div>
									</div>
								</div>
								</a>
								<a href="actividad">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-brown hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">fact_check</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR ACTIVIDADES</div>
										</div>
									</div>
								</div>
								</a>
								<a href="captura/buscar_actividad.php">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-blue-grey hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">perm_media</i>
										</div>
										<div class="content">
											<div class="text">REGISTRAR CAPTURA</div>
										</div>
									</div>
								</div>
								</a>
								<a href="captura">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="info-box bg-cyan hover-zoom-effect">
										<div class="icon">
											<i class="material-icons">free_cancellation</i>
										</div>
										<div class="content">
											<div class="text">MOSTRAR REPORTE</div>
										</div>
									</div>
								</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php
	include('foot.php');
	?>
