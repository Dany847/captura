<?php
require_once '../../connect/conexion.php';
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
              <h2>AGREGAR UN NUEVO CENTRO DE TRABAJO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../save/save_centro.php" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_centro" min="10" max="200" required>
                    <label class="form-label">Nombre del centro</label>
                  </div>
                  <div class="help-info">Nombre de centro: 10, Max. Value: 200</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_responsable" required>
                    <label class="form-label">Responsable</label>
                  </div>
                  <div class="help-info">Juan</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_paterno" required>
                    <label class="form-label">Apellido paterno</label>
                  </div>
                  <div class="help-info">Pérez</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_materno" required>
                    <label class="form-label">Apellido materno</label>
                  </div>
                  <div class="help-info">Pérez</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_zona" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar zona</option>
                      <?php
                      $query = $conn->query("SELECT * FROM `zona` ORDER BY `nombre_zona`") or die(mysqli_error());
                      while($fila = $query->fetch_array()){
                        ?>
                        <option value="<?php echo $fila['id_zona']?>"><?php echo $fila['nombre_zona']?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
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
