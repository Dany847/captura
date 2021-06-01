<?php
require_once '../../connect/conexion.php';
$quey = $conn->query("SELECT * FROM `zona` WHERE `id_zona` = '$_REQUEST[id_zona]'") or die(mysqli_error());
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
              <h2>AGREGAR ZONA</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_zona.php?id_zona=<?php echo $fila['id_zona'] ?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="numero_zona" min="3" max="15" value="<?php echo $fila['numero_zona'] ?>">
                    <label class="form-label">Nombre del centro</label>
                  </div>
                  <div class="help-info">Nombre de centro: 3, Max. Value: 15</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_zona" min="3" max="40" value="<?php echo $fila['nombre_zona'] ?>">
                    <label class="form-label">Nombre del centro</label>
                  </div>
                  <div class="help-info">Nombre de centro: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_responsable" min="3" max="50" value="<?php echo $fila['nombre_responsable'] ?>">
                    <label class="form-label">Responsable</label>
                  </div>
                  <div class="help-info">Juan: 3, Max. Value: 50</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_paterno" min="3" max="40" value="<?php echo $fila['apellido_paterno'] ?>">
                    <label class="form-label">Apellido paterno</label>
                  </div>
                  <div class="help-info">Pérez: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_materno" min="3" max="40" value="<?php echo $fila['apellido_materno'] ?>">
                    <label class="form-label">Apellido materno</label>
                  </div>
                  <div class="help-info">Pérez: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_nivel" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar nivel</option>
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