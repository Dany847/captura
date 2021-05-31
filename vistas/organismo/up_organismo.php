<?php
require_once '../../connect/conexion.php';
include('../layout/head.php');


$quey = $conn->query("SELECT * FROM `organismo` WHERE `id_organismo` = '$_REQUEST[id_organismo]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Capturar nombre del organismo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Organismo</li>
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
                            <form action="../update/edit_organismo.php?id_organismo=<?php echo $fila['id_organismo'] ?>" method="POST">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de Sector</label>
                                    <input type="text" name="nombre_org" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_org'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Responsable</label>
                                    <input type="text" name="responsable" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['responsable'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Zona</label>
                                    <select name="id_zona" class="form-control">
                                     <?php
                                     $query = $conn->query("SELECT * FROM `zonas`") or die(mysqli_error());
                                     while($fzona = $query->fetch_array()){

                                        if($fzona['id_zona']==$fila['id_zona']){ ?>

                                            <option value = "<?php echo $fzona['id_zona']?>" selected><?php echo $fzona['nombre']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $fzona['id_zona']?>"><?php echo $fzona['nombre']?></option>
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
            </div>
        </div>
    </div>
</div>
</section>
</div>
