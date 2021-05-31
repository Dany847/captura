<?php
require_once '../../connect/conexion.php';
include('head.php');

$quey = $conn->query("SELECT * FROM `centro_trabajo` WHERE `id_centro` = '$_REQUEST[id_centro]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1>Capturar nombre del centro</h1>
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
        <form action="../../update/edit_centro.php?id_centro=<?php echo $fila['id_centro'] ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Centro</label>
                    <input type="text" name="nombre_centro" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_centro'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Responsable</label>
                    <input type="text" name="nombre_responsable" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_responsable'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['apellido_paterno'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Apellido materno</label>
                    <input type="text" name="apellido_materno" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['apellido_materno'] ?>">
                  </div>
                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nivel</label>
                                    <select name="id_zona" class="form-control">
                                       <?php
                                     $query = $conn->query("SELECT * FROM `zona`") or die(mysqli_error());
                                     while($filaorg = $query->fetch_array()){

                                        if($filaorg['id_zona']==$fila['id_zona']){ ?>

                                            <option value = "<?php echo $filaorg['id_zona']?>" selected><?php echo $filaorg['nombre_zona']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $filaorg['id_zona']?>"><?php echo $filaorg['nombre_zona']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                            </select>
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