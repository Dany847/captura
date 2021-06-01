<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');
$quey = $conn->query("SELECT * FROM `miembro` WHERE `id_miembro` = '$_REQUEST[id_miembro]'") or die(mysqli_error());
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
              <h2>REGISTRAR FRENTE DE ACTIVISMO</h2>
            </div>
            <div class="body">
              <form id="form_advanced_validation" action="../../update/edit_miembro.php?id_miembro=<?php echo $fila['id_miembro']?>" method="POST">
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_organismo" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar organismo</option>
                      <?php
                                     $query = $conn->query("SELECT * FROM `organismo`") or die(mysqli_error());
                                     while($filaorg = $query->fetch_array()){

                                        if($filaorg['id_organismo']==$fila['id_organismo']){ ?>

                                            <option value = "<?php echo $filaorg['id_organismo']?>" selected><?php echo $filaorg['nombre_organismo']?></option>
                                            <?php

                                        } else { 

                                            ?>
                                            <option value = "<?php echo $filaorg['id_organismo']?>"><?php echo $filaorg['nombre_organismo']?></option>
                                            <?php
                                        }
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
                <div class="form-group form-float">
                  <div class="form-line">
                    <select name="id_frente" class="form-control show-tick">
                      <option selected="selected" disabled="disabled">Seleccionar frente</option>
                       <?php
                             $query = $conn->query("SELECT * FROM `frente`") or die(mysqli_error());
                             while($filaorg = $query->fetch_array()){

                                if($filaorg['id_frente']==$fila['id_frente']){ ?>

                                    <option value = "<?php echo $filaorg['id_frente']?>" selected><?php echo $filaorg['nombre_frente']?></option>
                                    <?php

                                } else { 

                                    ?>
                                    <option value = "<?php echo $filaorg['id_frente']?>"><?php echo $filaorg['nombre_frente']?></option>
                                    <?php
                                }
                            }
                            ?>
                    </select>
                  </div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="nombre" min="3" max="50" value="<?php echo $fila['nombre']?>">
                    <label class="form-label">Nombre</label>
                  </div>
                  <div class="help-info">Nombre activismo: 3, Max. Value: 50</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_paterno" min="3" max="40" value="<?php echo $fila['apellido_paterno']?>">
                    <label class="form-label">Apellido Paterno</label>
                  </div>
                  <div class="help-info">Apellido Paterno: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="text" class="form-control" name="apellido_materno" min="3" max="40" value="<?php echo $fila['apellido_materno']?>">
                    <label class="form-label">Apellido Materno</label>
                  </div>
                  <div class="help-info">Apellido Materno: 3, Max. Value: 40</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="facebook_link" value="<?php echo $fila['facebook_link']?>">
                    <label class="form-label">Link de Facebook</label>
                  </div>
                  <div class="help-info">Link de Facebook: http://, https://, ftp:// etc</div>
                </div>
                <div class="form-group form-float">
                  <div class="form-line">
                    <input type="url" class="form-control" name="twitter_link" value="<?php echo $fila['twitter_link']?>">
                    <label class="form-label">Link de Twitter</label>
                  </div>
                  <div class="help-info">Link de Twitter: http://, https://, ftp:// etc</div>
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