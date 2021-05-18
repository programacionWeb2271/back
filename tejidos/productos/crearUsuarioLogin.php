<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objetos/crearUsuarioLogin.php';

$database = new Database();
$db = $database->getConnection();

$user = new usuarioLog($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->usuario) &&
    !empty($data->apellido) &&
    !empty($data->sexo) &&
    !empty($data->municipio) &&
    !empty($data->tipo) &&
    !empty($data->estado) &&
    !empty($data->foto) &&
    !empty($data->correo) &&
    !empty($data->pass) &&
    !empty($data->login)

) {

    $user->usuario = $data->usuario;
    $user->apellido = $data->apellido;
    $user->sexo = $data->sexo;
    $user->municipio = $data->municipio;
    $user->tipo = $data->tipo;
    $user->estado = $data->estado;
    $user->foto = $data->foto;
    $user->correo = $data->correo;
    $user->pass = $data->pass;
    $user->login = $data->login;


    if ($user->usuarioLogs()) {

        http_response_code(201);

        echo json_encode(array("message" => "Se ha creado el usuario."));
    } else {

        http_response_code(503);

        echo json_encode(array("message" => "No se pudo crear el usuario."));
    }
} else {

    http_response_code(400);

    echo json_encode(array("message" => "No se puede crear el usuario, faltan datos."));
}
