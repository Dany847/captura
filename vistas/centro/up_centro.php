<?php
require_once '../../connect/conexion.php';
$quey = $conn->query("SELECT * FROM `centro_trabajo` WHERE `id_centro` = '$_REQUEST[id_centro]'") or die(mysqli_error());
$fila = $quey->fetch_array();
?>
<!DOCTYPE html>
<html>
<?php
include('head.php');
?>
<body class="theme-red ls-closed">
  <?php
  include('header.php');
  ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>ACTUALIZAR DATOS DE CENTRO DE TRABAJO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_centro.php?id_centro=<?php echo $fila['id_centro'] ?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_centro" min="10" max="200" value="<?php echo $fila['nombre_centro'] ?>">
                    <label class="form-label">Nombre del centro</label>
                  </div>
                  <div class="help-info">Nombre de centro: 10, Max. Value: 200</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_responsable" value="<?php echo $fila['nombre_responsable'] ?>">
                    <label class="form-label">Responsable</label>
                  </div>
                  <div class="help-info">Juan</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_paterno" value="<?php echo $fila['apellido_paterno'] ?>">
                    <label class="form-label">Apellido paterno</label>
                  </div>
                  <div class="help-info">Pérez</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_materno" value="<?php echo $fila['apellido_materno'] ?>">
                    <label class="form-label">Apellido materno</label>
                  </div>
                  <div class="help-info">Pérez</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_zona" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar zona</option>
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
                <button class="btn btn-primary waves-effect" type="submit" name="editar">GUARDAR</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
include('foot.php');
?>