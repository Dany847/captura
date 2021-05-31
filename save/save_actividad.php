<?php 
require_once '../connect/conexion.php';
if (ISSET($_POST['guardar'])) {

$nombre_actividad = $_POST['nombre_actividad'];
$url_facebook = $_POST['url_facebook'];
$url_twitter = $_POST['url_twitter'];
$fecha = $_POST['fecha'];

$query =  $conn->query("SELECT * FROM `actividad` WHERE `nombre_actividad` = '$nombre_actividad' && `fecha` = '$fecha'") or die(mysql_error());
	$q = $query->num_rows;
	if ($q == 1) {
		echo ' <script type="text/javascript">
 	alert("Nombre del actividad ya existe");
 	window.location = "../vistas/actividad/index.php";
 </script>';
 
	}else{
 $conn->query("INSERT INTO `actividad` VALUES('', '$nombre_actividad', '$url_facebook', '$url_twitter', '$fecha')") or die(mysql_error());
		echo ' <script type="text/javascript">
 	alert("Datos Guardados Exitosamente");
 	window.location = "../vistas/actividad/index.php";
 </script>';
	}
}
 ?>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
  function eliminar(id_zona) {
    console.log(id_zona);
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
         url:"../../delete/eliminar_zona.php?del=" + id_zona,
         success: function(res) {
          console.log(res);
        },      
      });
        swal("Poof! Registro eliminado!", {
          icon: "success",
        }).then((ok)=>{
          if(ok){
            location.href="../zona/index.php";
          }
        });
      } 
    });
  }
</script>