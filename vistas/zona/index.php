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
                    <h1>Datos de Captura</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Captura</li>
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
             <a href="create_zona.php">
              <button type="submit" class="btn btn-primary">Nuevo</button>     
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
             <thead>
              <tr>
                <th>N°</th>
                <th>Nivel de responsable</th>
                <th>N° de la zona</th>
                <th>Nombre de la zona</th>
                <th>Responsable</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $query =  $conn->query("select  zona.id_zona, zona.numero_zona, zona.nombre_zona, zona.nombre_responsable, zona.apellido_paterno, zona.apellido_materno, nivel.nombre_nivel
                from zona
                inner join nivel on nivel.id_nivel = zona.id_nivel") or die(mysql_error());
             $contar = 0;
             while($fila = $query->fetch_array()){
              $contar++;
              ?>
              <tr>
               <td><?php echo $contar; ?></td>
               <td><?php echo $fila['nombre_nivel']; ?></td>
               <td><?php echo $fila['numero_zona']; ?></td>
               <td><?php echo $fila['nombre_zona']; ?></td>
               <td><?php echo $fila['nombre_responsable']; ?></td>
               <td><?php echo $fila['apellido_paterno']; ?></td>
               <td><?php echo $fila['apellido_materno']; ?></td>
               <td style="text-align: center; width: 200px;" >
                <a onclick="preguntar(<?php echo $fila['id_zona']?>)"><img src="../img/boton-x.png"  width="20" height="20" border=0/> </a>

                &nbsp; &nbsp; &nbsp;
                <?php echo "<a href='up_zona.php?id_zona=".$fila['id_zona']."'> <img src='../img/boton-editar.png'  width='20' height='20' border=0/> </a>"; ?>
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
  <script type="text/javascript">
    function preguntar(id_zona){
      if(confirm('¿Estas seguro que deseas eliminar?'))
      {
        window.location.href = "../../delete/eliminar_zona.php?del=" + id_zona;
      }

    }

  </script>