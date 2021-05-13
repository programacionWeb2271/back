<?php
error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarReacciones.php';

$database = new Database();
$db = $database->getConnection();

$reaccion = new Reaccion($db);

$reaccion->id = isset($_GET['id']) ? $_GET['id'] : die();

$stmt = $municipio->read();
$num = $stmt->rowCount();

if ($reaccion ->id!=null ) {

        $reaccion_item = array(
            "id_publicacion" => $id_publicacion->id,
            "reaccion" => $reaccion->reaccion           
        );
        http_response_code(200);

        echo json_encode($reaccion_arr);
       
    } else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")
    );
}
