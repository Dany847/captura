<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');
$quey = $conn->query("SELECT * FROM `actividad` WHERE `id_actividad` = '$_REQUEST[id_actividad]'") or die(mysqli_error());
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
              <h2>ACTUALIZAR LA ACTIVIDAD</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_actividad.php?id_actividad=<?php echo $fila['id_actividad'] ?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_actividad" min="10" max="200" value="<?php echo $fila['nombre_actividad'] ?>">
                    <label class="form-label">Min/Max Value</label>
                  </div>
                  <div class="help-info">Min. Value: 10, Max. Value: 200</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="url_facebook" value="<?php echo $fila['url_facebook'] ?>">
                    <label class="form-label">Url de Facebook</label>
                  </div>
                  <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="url_twitter" value="<?php echo $fila['url_twitter'] ?>">
                    <label class="form-label">Url de Twitter</label>
                  </div>
                  <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="date" class="form-control" name="date" value="<?php echo $fila['fecha'] ?>">
                  </div>
                  <div class="help-info">YYYY-MM-DD format</div>
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