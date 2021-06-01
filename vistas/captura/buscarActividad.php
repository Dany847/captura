<?php
$conn = new mysqli('localhost', 'root', '', 'captura') or die(mysql_error());
if (!$conn) {
    die("Error: error de conexión");
}
if (isset($_POST["termino"])) {
    $termino = $_POST["termino"];
    $sql = "SELECT * FROM actividad
 		 WHERE nombre_actividad 
 		 LIKE '%" . $termino . "%'";
    $items = array();

    $result = mysqli_query($conn, $sql);
    while ($fila = mysqli_fetch_array($result)) {
        $items[] = array(
        	"value" => $fila["nombre_actividad"],
            "id" => $fila["id_actividad"]
        );
    }
    echo json_encode($items);
}
exit;
