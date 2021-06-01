<!DOCTYPE html>
<html>
<?php
require_once '../../connect/conexion.php';
include('head.php');
?>

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
              Buscar actividad para registrar captura

            </div>
            <div class="body">

              <form method="get" action="registrar_captura.php">
                <div class="row clearfix">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <div class="form-group form-float">
                      <div class="form-line">
                        <input type="text" class="form-control" id="termino">
                        <label class="form-label">Buscar actividad para registrar</label>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="idActividad" id="idActividad">
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Registrar</button>
                  </div>
                </div>
              </form>

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
        $("#termino").autocomplete({
          source: function(request, response) {
            $.ajax({
              url: "buscarActividad.php",
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
            $("#idActividad").val(ui.item.id);
            console.log(ui.item.id);
          }
        })
      })
    </script>


</body>

</html>