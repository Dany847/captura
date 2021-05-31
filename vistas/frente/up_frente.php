<?php
require_once '../../connect/conexion.php';
include('head.php');

$quey = $conn->query("SELECT * FROM `frente` WHERE `id_frente` = '$_REQUEST[id_frente]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1>Capturar nombre de la frente</h1>
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
        <form action="../../update/edit_frente.php?id_frente=<?php echo $fila['id_frente'] ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Frente</label>
                    <input type="text" name="nombre_frente" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_frente'] ?>">
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