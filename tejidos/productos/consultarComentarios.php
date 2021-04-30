<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarComentarios.php';

$database = new Database();
$db = $database->getConnection();

$comentario = new Comentarios($db);

$stmt = $publicacion->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $comentario_arr = array();
    $comentario_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $publicacion_item = array(
            "idPublicacion"=> $id_comentarios,
            "id_usuario"=> $id_usuario,
            "comentario"=> $comentario,
            "fecha"=> $Fecha
        );

        array_push($comentario_arr["data"], $comentario_item);
    }

    http_response_code(200);

    echo json_encode($comentario_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
