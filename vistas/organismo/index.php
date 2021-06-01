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
            <div class="body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                 <thead>
                  <tr>
                   <th>N°</th>
                   <th>Frente</th>
                   <th>Centro</th>
                   <th>Organisomo</th>
                   <th>Responsable</th>
                   <th>Apellido Paterno</th>
                   <th>Apellido Materno</th>
                   <th>Acción</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 $query =  $conn->query("select organismo.id_organismo, organismo.nombre_organismo, organismo.nombre_responsable,  organismo.apellido_paterno, organismo.apellido_materno, frente.nombre_frente, centro_trabajo.nombre_centro
                   from organismo
                   inner join frente on  frente.id_frente = organismo.id_frente
                   inner join centro_trabajo on  centro_trabajo.id_centro = organismo.id_centro") or die(mysql_error());
                 $contar = 0;
                 while($fila = $query->fetch_array()){
                  $contar++;
                  ?>
                  <tr>
                    <td><?php echo $contar; ?></td>
                    <td><?php echo $fila['nombre_frente']; ?></td>
                    <td><?php echo $fila['nombre_centro']; ?></td>
                    <td><?php echo $fila['nombre_organismo']; ?></td>
                    <td><?php echo $fila['nombre_responsable']; ?></td>
                    <td><?php echo $fila['apellido_paterno']; ?></td>
                    <td><?php echo $fila['apellido_materno']; ?></td>
                    <td style="text-align: center; width: 200px;" >
                      <a onclick="eliminar(<?php echo $fila['id_organismo']?>)"><img src="../img/boton-x.png"  width="20" height="20" border=0/> </a>

                      &nbsp; &nbsp; &nbsp;
                      <?php echo "<a href='up_organismo.php?id_organismo=".$fila['id_organismo']."'> <img src='../img/boton-editar.png'  width='20' height='20' border=0/> </a>"; ?>
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
  function eliminar(id_organismo) {
    console.log(id_organismo);
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
         url:"../../delete/eliminar_organismo.php?del=" + id_organismo,
         success: function(res) {
          console.log(res);
        },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
        }).then((ok)=>{
          if(ok){
            location.href="../organismo/index.php";
          }
        });
      } 
    });
  }
</script>