<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
if (isset($_GET["idActividad"]) && $_GET["idActividad"] != null) {
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
        WHERE a.id_actividad = " . $actividadId;
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
                                <form action="" enctype="multipart/form-data" method="post" id="registrarCaptura">

                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="miembro" class="form-control" id="miembro">
                                                    <label class="form-label">Buscar miembro para subir captura</label>
                                                    <input type="hidden" id="miembroId" name="miembroId">
                                                    <input type="hidden" value="<?php echo $actividadId; ?>" name="actividadId">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Selecciona imagen de captura de facebook</label>
                                                <div class="form-line">
                                                    <input type="file" name="facebookImg" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="form-label">Selecciona imagen de captura de twitter</label>
                                                    <input type="file" name="twitterImg">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect submit">Registrar</button>
                                    </div>

                                </form>
                                <div class="statusMsg"></div>
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
                                                    <td><?php echo $item["nombre"] . " " . $item["apellido_paterno"] . " " . $item["apellido_materno"]; ?></td>
                                                    <td>Imagen de la captura: <?php echo $item["url_cfacebook"] ?></td>
                                                    <td>Imagen de la captura: <?php echo $item["url_ctwitter"] ?></td>
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
                $(function() {
                    $("#miembro").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "buscarMiembro.php",
                                type: "post",
                                dataType: "json",
                                data: {
                                    termino: request.term
                                },
                                success: function(data) {
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            $("#miembroId").val(ui.item.id);
                            console.log(ui.item.id);
                        }
                    })
                })
                $(document).ready(function(e) {
                    $("#registrarCaptura").on("submit", function(e) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "save_captura.php",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function() {
                                $(".submit").attr("disabled", "disabled");
                                $("#registrarCaptura").css("opacity", "0.5");
                            },
                            success: function(msg) {
                                $('.statusMsg').html('');
                                if (msg == 'ok') {
                                    $('#registrarCaptura')[0].reset();
                                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">La captura se guardo exitosamente.</span>');
                                } else {
                                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Ocurrio algun error, intente de nuevo.</span>');
                                }
                                $('#registrarCaptura').css("opacity", "");
                                $(".submitBtn").removeAttr("disabled");
                            }
                        });
                    });
                });
            </script>
    </body>

</html>
<?php
} else {
    echo "No trae variable";
}
?>