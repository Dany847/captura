<?php

/** https://stackoverflow.com/questions/3531703/how-do-i-log-errors-and-warnings-into-a-file */
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'errors.log'); // Logging file path
// error_log("Prueba de errores");


if (!empty($_POST["miembroId"]) || !empty($_POST["actividadId"])) {
    $nomImgFacebbok = "";
    if (!empty($_FILES["facebookImg"]["type"])) {

        $fileName = time() . "_" . $_FILES["facebookImg"]["name"];
        $validExtensions = array("jpeg", "jpg", "png");
        $temporal = explode(".", $_FILES["facebookImg"]["name"]);
        $fileExtension = end($temporal);

        if ((($_FILES["facebookImg"]["type"] == "image/png") ||
                ($_FILES["facebookImg"]["type"] == "image/jpg") ||
                ($_FILES["facebookImg"]["type"] == "image/jpeg")) &&
            in_array($fileExtension, $validExtensions)
        ) {
            $sourcePath = $_FILES['facebookImg']['tmp_name'];
            $targetPath = "../capturas-img/" . $fileName;
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $nomImgFacebbok = $fileName;
            }
        }
    }

    $nomImgTwitter = "";
    if (!empty($_FILES["twitterImg"]["type"])) {

        $fileName = time() . "_" . $_FILES["twitterImg"]["name"];
        $validExtensions = array("jpeg", "jpg", "png");
        $temporal = explode(".", $_FILES["twitterImg"]["name"]);
        $fileExtension = end($temporal);

        if ((($_FILES["twitterImg"]["type"] == "image/png") ||
                ($_FILES["twitterImg"]["type"] == "image/jpg") ||
                ($_FILES["twitterImg"]["type"] == "image/jpeg")) &&
            in_array($fileExtension, $validExtensions)
        ) {
            $sourcePath = $_FILES['twitterImg']['tmp_name'];
            $targetPath = "../capturas-img/" . $fileName;
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $nomImgTwitter = $fileName;
            }
        }
    }

    $miembroId = $_POST["miembroId"];
    $actividadId = $_POST["actividadId"];
    require_once '../../connect/conexion.php';

    $sql = "INSERT INTO 
    `captura` (`id_captura`, `id_miembro`, `id_actividad`, `url_cfacebook`, `url_ctwitter`) 
    VALUES (NULL, '$miembroId', '$actividadId', '$nomImgFacebbok', '$nomImgTwitter')";

    $conn = new mysqli('localhost', 'root', '', 'captura') or die("Error");
    if ('$miembroId' == `id_miembro` && '$actividadId' == `id_actividad`) {
        echo "datos ya existe";
    }
    if (!$conn) {
        die("Error: error de conexi??n: " . $conn->connect_error);
    }
    $query = $conn->query($sql);
    error_log("q: " . $query);
    echo $query ? "ok" : "err";
}
