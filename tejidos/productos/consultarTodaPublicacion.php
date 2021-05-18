<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarTodaPublicaciones.php';

$database = new Database();
$db = $database->getConnection();

$publicacion = new Publicaciones($db);

$stmt = $publicacion->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $publicaciones_arr = array();
    $publicaciones_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $publicacion_item = array(
            "publicacion"=> $id_publicaciones,
            "id_usuario"=> $id_usuario,
            "texto"=> $texto,
            "imagen"=> $imagen,
            "fecha"=> $Fecha
        );

        array_push($publicaciones_arr["data"], $publicacion_item);
    }

    http_response_code(200);

    echo json_encode($publicaciones_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
