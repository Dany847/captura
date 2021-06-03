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
              <h2>REGISTRAR NUEVO MIEMBRO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../save/save_miembro.php" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_organismo" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar organismo</option>
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
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_nivel" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar nivel</option>
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
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_frente" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar frente</option>
                       <optgroup label='<?php echo "Fila 1"; ?>'>
                      <?php
                           $query = $conn->query("SELECT * FROM `frente` ORDER BY `nombre_frente`") or die(mysqli_error());
                            while($fila = $query->fetch_array()){
                             ?>
                            
                             <option value="<?php echo $fila['id_frente']?>"><?php echo $fila['nombre_frente']?></option>
                          
                         <?php
                         }
                         ?>
                          </optgroup>
                    </select>
                  </div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre" min="3" max="50" required>
                    <label class="form-label">Nombre</label>
                  </div>
                  <div class="help-info">Nombre activismo: 3, Max. Value: 50</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_paterno" min="3" max="40" required>
                    <label class="form-label">Apellido Paterno</label>
                  </div>
                  <div class="help-info">Apellido Paterno: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_materno" min="3" max="40" required>
                    <label class="form-label">Apellido Materno</label>
                  </div>
                  <div class="help-info">Apellido Materno: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="facebook_link" required>
                    <label class="form-label">Link de Facebook</label>
                  </div>
                  <div class="help-info">Link de Facebook: http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="twitter_link" required>
                    <label class="form-label">Link de Twitter</label>
                  </div>
                  <div class="help-info">Link de Twitter: http://, https://, ftp:// etc</div>
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
