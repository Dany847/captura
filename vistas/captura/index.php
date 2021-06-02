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
                        EXPORTABLE TABLE
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   <?php
                                   $query =  $conn->query("select captura.id_captura, miembro.nombre, miembro.apellido_paterno, centro_trabajo.nombre_centro, actividad.nombre_actividad
                                      from captura
                                      inner join miembro on miembro.id_miembro = captura.id_miembro
                                      inner join organismo on organismo.id_organismo = miembro.id_organismo
                                      inner join centro_trabajo on centro_trabajo.id_centro = organismo.id_centro
                                      inner join actividad on actividad.id_actividad = captura.id_actividad") or die(mysql_error());
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
<script type="text/javascript">
  function eliminar(id_centro) {
    console.log(id_centro);
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
           url:"../../delete/eliminar_centro.php?del=" + id_centro,
           success: function(res) {
              console.log(res);
          },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
      }).then((ok)=>{
          if(ok){
            location.href="../centro/index.php";
        }
    });
  } 
});
}
</script>
