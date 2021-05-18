<?php
error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../objetos/consultarComentarios.php';

$database = new Database();
$db = $database->getConnection();

$comentario = new Comentarios($db);
$comentario->id = isset($_POST['id']) ? $_POST['id'] : die();

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
        array("mensage" => "No se encontraron datos")
    );
}
