<?php
require_once '../../connect/conexion.php';
include('../layout/head.php');

$quey = $conn->query("SELECT * FROM `miembro` WHERE `idmiembros` = '$_REQUEST[idmiembros]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Capturar nombre del miembro</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Miembro</li>
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
                            <form action="../update/edit_miembro.php?idmiembros=<?php echo $fila['idmiembros']?>" method="POST">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="nombremiembro" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombremiembro']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">facebook</label>
                                    <input type="text" name="c_facebook" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['c_facebook']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" name="c_twitter" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['c_twitter']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Organismo</label>
                                    <select name="id_organismo" class="form-control">
                                       <?php
                                     $query = $conn->query("SELECT * FROM `organismo`") or die(mysqli_error());
                                     while($filaorg = $query->fetch_array()){

                                        if($filaorg['id_organismo']==$fila['id_organismo']){ ?>

                                            <option value = "<?php echo $filaorg['id_organismo']?>" selected><?php echo $filaorg['nombre_org']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $filaorg['id_organismo']?>"><?php echo $filaorg['nombre_org']?></option>
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
include('../layout/foot.php');
?>