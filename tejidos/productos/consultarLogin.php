<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarLogin.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Login($db);
$usuario->correo = isset($_POST['correo'] ) ? $_POST['correo']: die();
$usuario->pass = isset($_POST['pass'] ) ? $_POST['pass']: die();
$usuario->user();

if ($usuario ->correo!=null && $usuario->pass!=null) {
    $usuario_arr = array(
        "id_login" => $usuario-> idLog,
        "id_usuario" => $usuario -> idUser,
        "correo" => $usuario -> correo,
        "contrasenia" => $usuario ->pass
    );
    http_response_code(200);
    echo json_encode($usuario_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
