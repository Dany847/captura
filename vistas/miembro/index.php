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
              <h2>MIEMBROS GUARDADOS EN LA BASE DE DATOS</h2>
            </div>
            <div class="body">

              <div class="table-responsive">
                <a href="create_miembro.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                </a>
                <table id="example1" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                 <thead>
                  <tr>
                    <th>#</th>
                    <th>Organismo</th>
                    <th>Nivel</th>
                    <th>Frente</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Link de facebook</th>
                    <th>Link de twitter</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query =  $conn->query("select miembro.id_miembro, miembro.nombre, miembro.apellido_paterno, miembro.apellido_materno, miembro.facebook_link, miembro.twitter_link, organismo.nombre_organismo, nivel.nombre_nivel, frente.nombre_frente
                   from miembro
                   inner join organismo on organismo.id_organismo = miembro.id_organismo
                   inner join nivel on nivel.id_nivel = miembro.id_nivel
                   inner join frente on frente.id_frente = miembro.id_frente") or die(mysql_error());
                  $contar = 0;
                  while ($fila = $query->fetch_array()) {
                    $contar++;
                    ?>
                    <tr>
                      <td><?php echo $contar; ?></td>
                      <td><?php echo $fila['nombre_organismo']; ?></td>
                      <td><?php echo $fila['nombre_nivel']; ?></td>
                      <td><?php echo $fila['nombre_frente']; ?></td>
                      <td><?php echo $fila['nombre']; ?></td>
                      <td><?php echo $fila['apellido_paterno']; ?></td>
                      <td><?php echo $fila['apellido_materno']; ?></td>
                      <td><?php echo $fila['facebook_link']; ?></td>
                      <td><?php echo $fila['twitter_link']; ?></td>
                      <td style="text-align: center; width: 200px;">
                        <a onclick="eliminar(<?php echo $fila['id_miembro'] ?>)"><button type="button" class="btn bg-red btn-xs waves-effect" style="border-radius: 100px;">
                      <i class="material-icons">delete_forever</i>
                    </button> </a>

                        &nbsp; &nbsp; &nbsp;
                        <?php echo "<a href='up_miembro.php?id_miembro=" . $fila['id_miembro'] . "'> <button type='button' class='btn bg-light-green btn-xs waves-effect' style='border-radius: 100px;'>
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
  function eliminar(id_miembro) {
    console.log(id_miembro);
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
         url:"../../delete/eliminar_miembro.php?del=" + id_miembro,
         success: function(res) {
          console.log(res);
        },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
        }).then((ok)=>{
          if(ok){
            location.href="../miembro/index.php";
          }
        });
      } 
    });
  }
</script>