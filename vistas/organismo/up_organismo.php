<?php
require_once '../../connect/conexion.php';
include('head.php');


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
                    <h1>Actualizar datos de organismo</h1>
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
                            <form action="../../update/edit_organismo.php?id_organismo=<?php echo $fila['id_organismo'] ?>" method="POST">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre organismo</label>
                                    <input type="text" name="nombre_organismo" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre_organismo'] ?>">
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
                                    <label for="exampleInputEmail1">Zona</label>
                                    <select name="id_frente" class="form-control">
                                     <?php
                                     $query = $conn->query("SELECT * FROM `frente`") or die(mysqli_error());
                                     while($fzona = $query->fetch_array()){

                                        if($fzona['id_frente']==$fila['id_frente']){ ?>

                                            <option value = "<?php echo $fzona['id_frente']?>" selected><?php echo $fzona['nombre_frente']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $fzona['id_frente']?>"><?php echo $fzona['nombre_frente']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                             <div class="form-group">
                                    <label for="exampleInputEmail1">Zona</label>
                                    <select name="id_centro" class="form-control">
                                     <?php
                                     $query = $conn->query("SELECT * FROM `centro_trabajo`") or die(mysqli_error());
                                     while($fzona = $query->fetch_array()){

                                        if($fzona['id_centro']==$fila['id_centro']){ ?>

                                            <option value = "<?php echo $fzona['id_centro']?>" selected><?php echo $fzona['nombre_centro']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $fzona['id_centro']?>"><?php echo $fzona['nombre_centro']?></option>
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
