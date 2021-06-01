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
              <h2>REGISTRAR FRENTE DE ACTIVISMO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../save/save_frente.php" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_frente" min="10" max="200" required>
                    <label class="form-label">FRENTE DE ACTIVISMO</label>
                  </div>
                  <div class="help-info">Nombre Frente: 10, Max. Value: 200</div>
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