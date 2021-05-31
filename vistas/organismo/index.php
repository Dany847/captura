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
      <h1>Datos del Organismo</h1>
   </div>
   <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="#">Inicio</a></li>
       <li class="breadcrumb-item active">Organismo</li>
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
        <a href="create_organismo.php">
        <button type="submit" class="btn btn-primary">Nuevo</button>     
        </a>
      </div>
     <!-- /.card-header -->
     <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
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
                      <a onclick="preguntar(<?php echo $fila['id_organismo']?>)"><img src="../img/boton-x.png"  width="20" height="20" border=0/> </a>

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
