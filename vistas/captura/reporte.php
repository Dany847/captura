<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');
?>
<!-- JQuery DataTable Css -->
<link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
                    <h2>
                        IFORME FINAL
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDOS</th>
                                    <th>ZONA/CENTRO</th>
                                    <th>ACTIVIDAD</th>
                                    <th>ACCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                 <?php
                                 $query =  $conn->query("select informe.id_informe, informe.fecha_cierre, informe.p_facebook, informe.p_twitter, informe.r_facebook, informe.r_twitter, frente.nombre_frente, zona.nombre_zona
                                  from informe
                                  inner join actividad on actividad.id_actividad = informe.id_actividad

                                  inner join frente on frente.id_frente = informe.id_frente
                                  inner join zona on zona.id_zona = informe.id_zona") or die(mysql_error());
                                 $contar = 0;
                                 while($fila = $query->fetch_array()){
                                  $contar++;
                                  ?>
                                  <tr>
                                   <td><?php echo $contar; ?></td>
                                   <td><?php echo $fila['nombre']; ?></td>
                                   <td><?php echo $fila['apellido_paterno']; ?></td>
                                   <td><?php echo $fila['nombre_centro']; ?></td>
                                   <td><?php echo $fila['nombre_actividad']; ?></td>
                                   <td>
                                       <a onclick="eliminar(<?php echo $fila['id_informe']?>)"><button type="button" class="btn bg-red btn-xs waves-effect" style="border-radius: 100px;">
                                          <i class="material-icons">delete_forever</i>
                                      </button> </a>
                                  </td>
                              </tr>
                              <?php
                          }
                          ?>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</section>
</body>
<?php
include('foot.php');
?>