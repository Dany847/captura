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
              <h2>ACTIVIDADES GUARDADOS EN LA BASE DE DATOS</h2>
            </div>
            <div class="body">
            <div class="table-responsive">
              <a href="create_actividad.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                </a>
              <table id="example1" class="table table-bordered table-striped table-hover js-basic-example dataTable">
               <thead>
                <tr>
                  <th>N°</th>
                  <th>Actividad</th>
                  <th>Facebook</th>
                  <th>Twitter</th>
                  <th>Fecha programado</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $query =  $conn->query("SELECT * FROM `actividad` ") or die(mysql_error());
               $contar = 0;
               while($fila = $query->fetch_array()){
                $contar++;
                ?>
                <tr>
                 <td><?php echo $contar; ?></td>
                 <td><?php echo $fila['nombre_actividad']; ?></td>
                 <td><?php echo $fila['url_facebook']; ?></td>
                 <td><?php echo $fila['url_twitter']; ?></td>
                 <td><?php echo $fila['fecha']; ?></td>
                 <td style="text-align: center; width: 200px;" >
                  <a onclick="eliminar(<?php echo $fila['id_actividad']?>)"><button type="button" class="btn bg-red btn-xs waves-effect" style="border-radius: 100px;">
                      <i class="material-icons">delete_forever</i>
                    </button> </a>

                  &nbsp; &nbsp; &nbsp;
                  <?php echo "<a href='up_actividad.php?id_actividad=".$fila['id_actividad']."'> <button type='button' class='btn bg-light-green btn-xs waves-effect' style='border-radius: 100px;'>
                    <i class='material-icons'>border_color</i>
                    </button> </a>"; ?>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
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
<script type="text/javascript">
  function eliminar(id_actividad) {
    console.log(id_actividad);
    swal({
      title: "Esta seguro de Eliminar?",
      text: "Una vez eliminado no se prodra restablecer!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((OK) => {
      if (OK) {
        $.ajax({
         url:"../../delete/eliminar_actividad.php?del=" + id_actividad,
         success: function(res) {
          console.log(res);
        },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
        }).then((ok)=>{
          if(ok){
            location.href="../actividad/index.php";
          }
        });
      } 
    });
  }
</script>