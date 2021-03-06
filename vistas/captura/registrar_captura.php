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
        <input type="hidden" value="<?php echo $actividadId; ?>" name="Id" id="actividadId">
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
                                                    <input type="file" name="facebookImg" id="facebookImg" required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group form-float">
                                                <label class="form-label">Selecciona imagen de captura de twitter</label>
                                                <div class="form-line">
                                                    <input type="file" name="twitterImg" id="twitterImg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <button class="btn btn-primary btn-lg m-l-15 waves-effect submit" id="registrar">Registrar</button>
                                    </div>

                                </form>
                                <div class="statusMsg"></div>
                                <hr>
                                <h4>Ultimas capturas agregadas de esta actividad</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Img facebook</th>
                                            <th>Img twitter</th>
                                            <th>Hora registrada</th>
                                        </tr>
                                    </thead>
                                    <tbody id="DataResult">

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
                llenarTabla();
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
                                    limpiar();
                                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">La captura se guardo exitosamente.</span>');
                                    llenarTabla();
                                } else {
                                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Ocurrio algun error, intente de nuevo.</span>');
                                }
                            }
                        });
                    });
                });

                function llenarTabla() {
                    let actividadId = $("#actividadId").val();
                    $.ajax({
                        url: "ultimosAgregados.php",
                        type: "post",
                        data: {
                            id: actividadId
                        },
                        dataType: "json",
                        success: function(data) {
                            let html = "";
                            let i;
                            for (i = 0; i < data.length; i++) {
                                html += "<tr>" +
                                    "<td>" + data[i].nombre + "</td>" +
                                    "<td><img src='../capturas-img/" + data[i].url_cfacebook + "' height='40'></td>" +
                                    "<td><img src='../capturas-img/" + data[i].url_ctwitter + "' height='40'></td>" +
                                    "<td>" + data[i].hora + "</td>"
                            }

                            $('#DataResult').html(html);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert("ocurrio algun error")
                        }
                    });
                }

                function limpiar() {
                    $("#miembro").val("");
                    $("#miembroId").val("");
                    $("#facebookImg").val("");
                    $("#twitterImg").val("");
                }
            </script>
    </body>

</html>
<?php
} else {
    echo "No trae variable";
}
?>