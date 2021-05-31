<?php
require_once '../../connect/conexion.php';
include('head.php');

$quey = $conn->query("SELECT * FROM `miembro` WHERE `id_miembro` = '$_REQUEST[id_miembro]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?> 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Actualizar datos de la persona</h1>
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
                            <form action="../../update/edit_miembro.php?id_miembro=<?php echo $fila['id_miembro']?>" method="POST">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['nombre']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido paterno</label>
                                    <input type="text" name="apellido_paterno" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['apellido_paterno']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido materno</label>
                                    <input type="text" name="apellido_materno" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['apellido_materno']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link de facebook</label>
                                    <input type="text" name="facebook_link" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['facebook_link']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link de twitter</label>
                                    <input type="text" name="twitter_link" class="form-control" id="exampleInputEmail1" value="<?php echo $fila['twitter_link']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Organismo</label>
                                    <select name="id_organismo" class="form-control">
                                     <?php
                                     $query = $conn->query("SELECT * FROM `organismo`") or die(mysqli_error());
                                     while($filaorg = $query->fetch_array()){

                                        if($filaorg['id_organismo']==$fila['id_organismo']){ ?>

                                            <option value = "<?php echo $filaorg['id_organismo']?>" selected><?php echo $filaorg['nombre_organismo']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $filaorg['id_organismo']?>"><?php echo $filaorg['nombre_organismo']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nivel</label>
                                <select name="id_nivel" class="form-control">
                                 <?php
                                 $query = $conn->query("SELECT * FROM `nivel`") or die(mysqli_error());
                                 while($filaorg = $query->fetch_array()){

                                    if($filaorg['id_nivel']==$fila['id_nivel']){ ?>

                                        <option value = "<?php echo $filaorg['id_nivel']?>" selected><?php echo $filaorg['nombre_nivel']?></option>
                                        <?php

                                    } else { 

                                        ?>
                                        <option value = "<?php echo $filaorg['id_nivel']?>"><?php echo $filaorg['nombre_nivel']?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Frente</label>
                            <select name="id_frente" class="form-control">
                             <?php
                             $query = $conn->query("SELECT * FROM `frente`") or die(mysqli_error());
                             while($filaorg = $query->fetch_array()){

                                if($filaorg['id_frente']==$fila['id_frente']){ ?>

                                    <option value = "<?php echo $filaorg['id_frente']?>" selected><?php echo $filaorg['nombre_frente']?></option>
                                    <?php

                                } else { 

                                    ?>
                                    <option value = "<?php echo $filaorg['id_frente']?>"><?php echo $filaorg['nombre_frente']?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

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