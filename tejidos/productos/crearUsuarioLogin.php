<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objetos/crearUsuario.php';

$database = new Database();
$db = $database->getConnection();

$user = new usuarioLog($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->usuario) &&
    !empty($data->apellido) &&
    !empty($data->genero) &&
    !empty($data->nacimineto) &&
    !empty($data->municipio) &&
    !empty($data->tipo) &&
    !empty($data->estado) &&    
    !empty($data->foto) &&
    !empty($data->correo) &&
    !empty($data->pass) &&
    !empty($data->estado1)
    
){

    $comentario->publicacion = $data->publicacion;
    $comentario->usuario = $data->usuario;
    $comentario->comentario = $data->comentario;

    if ($user->usuarioLog()) {

        http_response_code(201);

        echo json_encode(array("message" => "Se ha creado el comentario."));
    } else {

        http_response_code(503);

        echo json_encode(array("message" => "No se pudo crear el comentario."));
    }
} else {

    http_response_code(400);

    echo json_encode(array("message" => "No se puede crear el comenatario, faltan datos."));
}
