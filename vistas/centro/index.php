<?php
require_once '../../connect/conexion.php';
include('head.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Datos de centro de trabajo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Centro</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">

         <div class="card">
           <div class="card-header">
             <a href="create_centro.php">
              <button type="submit" class="btn btn-primary">Nuevo</button>     
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
              <tr>
                <th>N°</th>
                <th>Zona</th>
                <th>Nombre del centro</th>
                <th>Responsable</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $query =  $conn->query("select centro_trabajo.id_centro, centro_trabajo.nombre_centro, centro_trabajo.nombre_responsable, centro_trabajo.apellido_paterno, centro_trabajo.apellido_materno, zona.nombre_zona
                from centro_trabajo
                inner join zona on zona.id_zona = centro_trabajo.id_zona") or die(mysql_error());
             $contar = 0;
             while($fila = $query->fetch_array()){
              $contar++;
              ?>
              <tr>
               <td><?php echo $contar; ?></td>
               <td><?php echo $fila['nombre_zona']; ?></td>
               <td><?php echo $fila['nombre_centro']; ?></td>
               <td><?php echo $fila['nombre_responsable']; ?></td>
               <td><?php echo $fila['apellido_paterno']; ?></td>
               <td><?php echo $fila['apellido_materno']; ?></td>
               <td style="text-align: center; width: 200px;" >
                <a onclick="eliminar(<?php echo $fila['id_centro']?>)"><img src="../img/boton-x.png"  width="20" height="20" border=0/> </a>

                &nbsp; &nbsp; &nbsp;
                <?php echo "<a href='up_centro.php?id_centro=".$fila['id_centro']."'> <img src='../img/boton-editar.png'  width='20' height='20' border=0/> </a>"; ?>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php 
include('foot.php');
?>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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