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
                <th>Nombre de frente</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $query =  $conn->query("SELECT * FROM `frente` ") or die(mysql_error());
             $contar = 0;
             while($fila = $query->fetch_array()){
              $contar++;
              ?>
              <tr>
               <td><?php echo $contar; ?></td>
               <td><?php echo $fila['nombre_frente']; ?></td>
               <td style="text-align: center; width: 200px;" >

                <a onclick="eliminar(<?php echo $fila['id_frente']?>)"><button type="button" class="btn bg-red btn-xs waves-effect" style="border-radius: 100px; ">
                <i class="material-icons">delete_forever</i>
              </button></a>

                &nbsp; &nbsp; &nbsp;
                <?php echo "<a href='up_frente.php?id_frente=".$fila['id_frente']."'> <button type='button' class='btn bg-light-green btn-xs waves-effect' style='border-radius: 100px;'>
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
  function eliminar(id_frente) {
    console.log(id_frente);
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
         url:"../../delete/eliminar_frente.php?del=" + id_frente,
         success: function(res) {
          console.log(res);
        },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
        }).then((ok)=>{
          if(ok){
            location.href="../frente/index.php";
          }
        });
      } 
    });
  }
</script>
