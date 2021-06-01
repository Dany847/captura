<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
if (isset($_GET["idActividad"])) {
    include('head.php');
    $actividadId = $_GET["idActividad"];

?>

    <body class="theme-red ls-closed">
        <?php
        $sqlUltimoAgregados =
            "SELECT m.nombre, m.apellido_paterno, m.apellido_materno, a.nombre_actividad, c.url_cfacebook, c.url_ctwitter
        FROM captura c 
        INNER JOIN miembro m
        ON c.id_miembro = m.id_miembro
        INNER JOIN actividad a
        ON c.id_actividad = a.id_actividad
        WHERE a.id_actividad = " + $actividadId;
        include('header.php');
        $actividadSql = "SELECT *
                        FROM actividad
                        WHERE id_actividad = " . $actividadId;
        $query =  mysqli_query($conn, $actividadSql);
        $actividad = "";
        if ($query) {
            $actividad = mysqli_fetch_array($query);
        } else {
            echo mysqli_error($conn);
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h4>Registrar captura de <?php echo $actividad["nombre_actividad"]; ?></h4>
                                <small><?php echo $actividad["fecha"]; ?></small>
                            </div>
                            <div class="body">
                                <form action=""></form>

                                <hr>
                                <h4>Ultimas capturas agregadas de esta actividad</h4>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Img facebook</th>
                                            <th>Img twitter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query =  mysqli_query($conn, $sqlUltimoAgregados);
                                        if ($query) {
                                            while ($item = mysqli_fetch_array($query)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $item["nombre"] ?></td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo mysqli_error($conn);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include('foot.php');
            ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


            <script>

            </script>
    </body>

</html>
<?php
} else {
    echo "No trae variable";
}
?>