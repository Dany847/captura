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
                            <a href="create_miembro.php">
                                <button type="submit" class="btn btn-primary">Nuevo</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
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
                                                <a onclick="preguntar(<?php echo $fila['id_miembro'] ?>)"><img src="../img/boton-x.png" width="20" height="20" border=0 /> </a>

                                                &nbsp; &nbsp; &nbsp;
                                                <?php echo "<a href='up_miembro.php?id_miembro=" . $fila['id_miembro'] . "'> <img src='../img/boton-editar.png'  width='20' height='20' border=0/> </a>"; ?>
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
    function preguntar(id_miembro){
      if(confirm('¿Estas seguro que deseas eliminar?'))
      {
        window.location.href = "../../delete/eliminar_miembro.php?del=" + id_miembro;
      }

    }

  </script>