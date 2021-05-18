<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarPublicaciones.php';

$database = new Database();
$db = $database->getConnection();

$publicacion = new Publicaciones($db);
$publicacion->id = isset($_POST['id']) ? $_POST['id'] : die();

$publicacion->read();

if ($publicacion->id != null) {

    $publicaciones_arr = array(

        "id_publicaciones" => $publicacion->id,
        "id_usuario" => $publicacion->idUser,
      //"nombre_usuario" => $publicacion->nombre,
        "texto" => $publicacion->texto,
        "imagen" => $publicacion->imagen,
        "Fecha" => $publicacion->fecha
    );

    http_response_code(200);
    echo json_encode($publicaciones_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
