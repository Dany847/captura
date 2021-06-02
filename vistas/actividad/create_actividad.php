<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
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
              <h2>AGREGAR UNA NUEVA ACTIVIDAD</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../save/save_actividad.php" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_actividad" min="10" max="200" required>
                    <label class="form-label">Min/Max Value</label>
                  </div>
                  <div class="help-info">Min. Value: 10, Max. Value: 200</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="url_facebook" required>
                    <label class="form-label">Url de Facebook</label>
                  </div>
                  <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="url_twitter" required>
                    <label class="form-label">Url de Twitter</label>
                  </div>
                  <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="date" class="form-control" name="fecha" required>
                  </div>
                  <div class="help-info">YYYY-MM-DD format</div>
                </div>
                <button class="btn btn-primary waves-effect" type="submit" name="guardar">GUARDAR</button>
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