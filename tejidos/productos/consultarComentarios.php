<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarComentarios.php';

$database = new Database();
$db = $database->getConnection();

$comentario = new Comentarios($db);
$comentario->id = isset($_GET['id']) ? $_GET['id'] : die();

$comentario->read();

if ($comentario->id != null) {

    $publicaciones_arr = array(

        "id_publicaciones" => $comentario->id,
        "id_usuario" => $comentario->idUser,
        "comentario" => $comentario->comentario,
        "Fecha" => $comentario->fecha
    );

    http_response_code(200);
    echo json_encode($publicaciones_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
