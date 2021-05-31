<?php
require_once '../../connect/conexion.php';
include('head.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1>Capturar nombre de la zona</h1>
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
        <form action="../../save/save_nivel.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Nivel</label>
                    <input type="text" name="nombre_nivel" class="form-control" id="exampleInputEmail1" placeholder="Nombre de nivel">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Abreviatura</label>
                    <input type="text" name="abrev_nivel" class="form-control" id="exampleInputEmail1" placeholder="Nombre de abreviatura">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
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
include('../foot.php');
?>