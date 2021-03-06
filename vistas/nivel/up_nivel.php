<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');

$quey = $conn->query("SELECT * FROM `nivel` WHERE `id_nivel` = '$_REQUEST[id_nivel]'") or die(mysqli_error());
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
              <h2>ACTUALIZAR NIVEL DE ACTIVISMO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_nivel.php?id_nivel=<?php echo $fila['id_nivel'] ?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre_nivel" min="5" max="40" value="<?php echo $fila['nombre_nivel'] ?>">
                    <label class="form-label">Nombre de nivel</label>
                  </div>
                  <div class="help-info">Activista: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="abrev_nivel" min="1" max="5" value="<?php echo $fila['abrev_nivel'] ?>">
                    <label class="form-label">Abreviatura</label>
                  </div>
                  <div class="help-info">Abreviatura: 1, Max. Value: 5</div>
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