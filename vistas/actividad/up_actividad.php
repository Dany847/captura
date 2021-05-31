<?php
require_once '../../connect/conexion.php';
include('head.php');

$quey = $conn->query("SELECT * FROM `actividad` WHERE `id_actividad` = '$_REQUEST[id_actividad]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1>Capturar nombre de la actividad</h1>
   </div>
   <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Inicio</a></li>
       <li class="breadcrumb-item active">Zona</li>
    </ol>
 </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
    <div class="row">
     <div class="col-12">

      <div class="card">
     <!-- /.card-header -->
     <div class="card-body">
        <form action="../../update/edit_actividad.php?id_actividad=<?php echo $fila['id_actividad'] ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de la actividad</label>
                    <input type="text" name="nombre_actividad" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_actividad'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Url de Facebook</label>
                    <input type="text" name="url_facebook" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['url_facebook'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Url de Twitter</label>
                    <input type="text" name="url_twitter" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['url_twitter'] ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Fecha</label>
                    <input type="date" name="fecha" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['fecha'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="editar">Guardar</button>
                </div>
              </form>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
include('foot.php');
?>