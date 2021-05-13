<?php
error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarReacciones.php';

$database = new Database();
$db = $database->getConnection();

$reaccion = new Reaccion($db);

$stmt = $municipio->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $reaccion_arr = array();
    $reaccion_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $reaccion_item = array(
            "id_publicacion" => $id_publicacion,
            "reaccion" => $reaccion            
        );

        array_push($reaccion_arr["data"], $reaccion_item);
    }

    http_response_code(200);

    echo json_encode($reaccion_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")
    );
}
