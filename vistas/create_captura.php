<?php 
require_once '../connect/conexion.php';
include('head.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Datos de Captura</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Captura</li>
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
                        <div class="card-header">
                            <a href="create_captura.php">
                                <button type="submit" class="btn btn-primary">Nuevo</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Persona</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                $query = $conn->query("SELECT * FROM `actividad` ORDER BY `nombre`") or die(mysqli_error());
								while($fila = $query->fetch_array()){
                               ?> <tr>
                                        <td width="300px">
                                            <?php
												echo ' <input type = "checkbox" name = "id_actividad[]" value = "'.$fila['id_actividad'].'"></center>
												';	
                                                echo $fila['nombre'];
                                ?>
                                        </td>
                                        <?php
                                            }
											?>
                                    </tr>
                                </tbody>
                            </table>
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