
<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');
$quey = $conn->query("SELECT * FROM `organismo` WHERE `id_organismo` = '$_REQUEST[id_organismo]'") or die(mysqli_error());
$fila = $quey->fetch_array();
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
              <h2>ACTUALIZAR ORGANISMO</h2>
          </div>
          <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_organismo.php?id_organismo=<?php echo $fila['id_organismo'] ?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_frente" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar frente</option>
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
        </div>
        <div class="form-group form-float">
          <div class="form-line">
            <select name="id_centro" class="form-control show-tick">
              <option selected="selected" disabled="disabled">Seleccionar centro</option>
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
<div class="form-group form-float">
  <div class="form-line">
    <input type="text" class="form-control" name="nombre_organismo" min="3" max="100" value="<?php echo $fila['nombre_organismo'] ?>">
    <label class="form-label">Nombre de organismo</label>
</div>
<div class="help-info">Nombre de organismo: 3, Max. Value: 100</div>
</div>
<div class="form-group form-float">
  <div class="form-line">
    <input type="text" class="form-control" name="nombre_responsable" min="3" max="50" value="<?php echo $fila['nombre_responsable'] ?>">
    <label class="form-label">Responsable</label>
</div>
<div class="help-info">Apellido Paterno: 3, Max. Value: 40</div>
</div>
<div class="form-group form-float">
  <div class="form-line">
    <input type="text" class="form-control" name="apellido_paterno" min="3" max="40" value="<?php echo $fila['apellido_paterno'] ?>">
    <label class="form-label">Apellido paterno</label>
</div>
<div class="help-info">Apellido paterno: 3, Max. Value: 40</div>
</div>
<div class="form-group form-float">
  <div class="form-line">
    <input type="text" class="form-control" name="apellido_materno" min="3" max="40" value="<?php echo $fila['apellido_materno'] ?>">
    <label class="form-label">Apellido materno</label>
</div>
<div class="help-info">Apellido materno: 3, Max. Value: 40</div>
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
