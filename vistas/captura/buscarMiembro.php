<?php
$conn = new mysqli('localhost', 'root', '', 'captura') or die(mysql_error());
if (!$conn) {
    die("Error: error de conexión");
}
if (isset($_POST["termino"])) {
    $termino = $_POST["termino"];
    $sql = "SELECT * FROM miembro 
    WHERE nombre LIKE '%" . $termino . "%' 
    OR apellido_paterno LIKE '%" . $termino . "%' 
    OR apellido_materno LIKE '%" . $termino . "%'";
    $items = array();

    $result = mysqli_query($conn, $sql);
    while ($fila = mysqli_fetch_array($result)) {
        $items[] = array(
            "value" => $fila["nombre"] . " " . $fila["apellido_paterno"] . " " . $fila["apellido_materno"],
            "id" => $fila["id_miembro"]
        );
    }
    echo json_encode($items);
}
exit;
