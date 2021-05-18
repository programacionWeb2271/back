<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objetos/crearPublicacion.php';

$database = new Database();
$db = $database->getConnection();

$publicacion = new publicacion($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->usuario) &&
    !empty($data->texto) &&
    !empty($data->imagen) &&
    !empty($data->tipo) &&
    !empty($data->estado)
) {

    $publicacion->usuario = $data->usuario;
    $publicacion->texto = $data->texto;
    $publicacion->imagen = $data->imagen;
    $publicacion->tipo = $data->tipo;
    $publicacion->estado = $data->estado;

    if ($publicacion->publicacion()) {

        http_response_code(201);

        echo json_encode(array("message" => "Se ha creado la publicacion."));
    } else {

        http_response_code(503);

        echo json_encode(array("message" => "No se pudo crear la publicacion."));
    }
} else {

    http_response_code(400);

    echo json_encode(array("message" => "No se puede crear la publicacion, faltan datos."));
}
