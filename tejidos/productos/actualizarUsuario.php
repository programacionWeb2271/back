<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objetos/actualizarUsuario.php';

$database = new Database();
$db = $database->getConnection();

$actualiza = new actualizar($db);

$data = json_decode(file_get_contents("php://input"));

$actualiza->id = $data->id;

$actualiza->correo = $data->correo;
$actualiza->pass = $data->pass;
$actualiza->estado = $data->estado;
$actualiza->id = $data->id;

if ($actualiza->actualizar()) {

    http_response_code(200);

    echo json_encode(array("message" => "Se ha actualizado el usuario."));
} else {

    http_response_code(503);
    echo json_encode(array("message" => "No se pudo actualizar el usuario."));
}
