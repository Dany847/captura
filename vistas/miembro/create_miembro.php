<?php
require_once '../../connect/conexion.php';
include('../layout/head.php');
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
                            <form action="../../save/save_miembro.php" method="POST">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Organismo</label>
                                        <select name="id_organismo" class="form-control">
                                            <option selected="selected" disabled="disabled">Seleccione una opción
                                            </option>
                                            <?php
                                            $query = $conn->query("SELECT * FROM `organismo` ORDER BY `nombre_organismo`") or die(mysqli_error());
                                            while($fila = $query->fetch_array()){
                                              ?>
                                              <option value="<?php echo $fila['id_organismo']?>"><?php echo $fila['nombre_organismo']?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Nivel</label>
                                        <select name="id_nivel" class="form-control">
                                            <option selected="selected" disabled="disabled">Seleccione una opción
                                            </option>
                                            <?php
                                            $query = $conn->query("SELECT * FROM `nivel` ORDER BY `nombre_nivel`") or die(mysqli_error());
                                            while($fila = $query->fetch_array()){
                                              ?>
                                              <option value="<?php echo $fila['id_nivel']?>"><?php echo $fila['nombre_nivel']?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                        <label for="exampleInputEmail1">Frente</label>
                                        <select name="id_frente" class="form-control">
                                            <option selected="selected" disabled="disabled">Seleccione una opción
                                            </option>
                                            <?php
                                            $query = $conn->query("SELECT * FROM `frente` ORDER BY `nombre_frente`") or die(mysqli_error());
                                            while($fila = $query->fetch_array()){
                                              ?>
                                              <option value="<?php echo $fila['id_frente']?>"><?php echo $fila['nombre_frente']?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="nombre" class="form-control"
                                    id="exampleInputEmail1" placeholder="Escribe un nombre">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido paterno</label>
                                    <input type="text" name="apellido_paterno" class="form-control"
                                    id="exampleInputEmail1" placeholder="Apellido paterno">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Apellido materno</label>
                                    <input type="text" name="apellido_materno" class="form-control"
                                    id="exampleInputEmail1" placeholder="apellido materno">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link de facebook</label>
                                    <input type="text" name="facebook_link" class="form-control"
                                    id="exampleInputEmail1" placeholder="Link de Facebook">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link de Twitter</label>
                                    <input type="text" name="twitter_link" class="form-control"
                                    id="exampleInputEmail1" placeholder="link de Twitter">
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
include('../layout/foot.php');
?>