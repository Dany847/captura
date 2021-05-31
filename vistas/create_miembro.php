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
                            <form action="../save/save_miembro.php" method="POST">
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
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="nombremiembro" class="form-control"
                                    id="exampleInputEmail1" placeholder="Escribe un nombre">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">facebook</label>
                                    <input type="text" name="c_facebook" class="form-control"
                                    id="exampleInputEmail1" placeholder="Escribe un facebook">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter</label>
                                    <input type="text" name="c_twitter" class="form-control"
                                    id="exampleInputEmail1" placeholder="Escribe un twitter">
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
include('foot.php');
?>