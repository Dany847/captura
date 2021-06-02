<?php

/** https://stackoverflow.com/questions/3531703/how-do-i-log-errors-and-warnings-into-a-file */
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'errors.log'); // Logging file path
// error_log("Prueba de errores");
$conn = new mysqli('localhost', 'root', '', 'captura') or die("Error");
if (!$conn) {
    die("Error: error de conexión: " . $conn->connect_error);
}
if (isset($_POST["id"])) {

    $id = $_POST["id"];
    error_log("id: " . $id);
    $sqlUltimoAgregados =
        "SELECT m.nombre, m.apellido_paterno, m.apellido_materno, a.nombre_actividad, c.url_cfacebook, c.url_ctwitter, c.created_at
        FROM captura c 
        INNER JOIN miembro m
        ON c.id_miembro = m.id_miembro
        INNER JOIN actividad a
        ON c.id_actividad = a.id_actividad
        WHERE a.id_actividad = " . $id .
        " ORDER BY id_captura DESC
        LIMIT 15";

    $items = array();
    $query =  mysqli_query($conn, $sqlUltimoAgregados);
    while ($fila = mysqli_fetch_array($query)) {
        $items[] = array(
            "nombre" => $fila["nombre"] . " " . $fila["apellido_paterno"] . " " . $fila["apellido_materno"],
            "url_cfacebook" => $fila["url_cfacebook"],
            "url_ctwitter" => $fila["url_ctwitter"],
            "hora" => $fila["created_at"]
        );
    }
    echo json_encode($items);
}
exit;
