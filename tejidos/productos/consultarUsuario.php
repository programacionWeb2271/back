<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarUsuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuarios($db);
$usuario->id = isset($_POST['id']) ? $_POST['id'] : die();
$usuario->read();

if ($usuario ->id!=null) {

    $reaccion_arr = array(
        "nombre_usuario" => $usuario-> nombre,
        "apellido" => $usuario -> apellido,
        "sexo" => $usuario -> genero,
        "Fecha_nacimiento" =>$usuario -> fecha,
        "id_municipios" =>$usuario ->municipio,
        "tipo" =>$usuario -> tipo,
        "foto_perfil" =>$usuario -> foto
    );
    http_response_code(200);
    var_dump($reaccion_arr);
    echo json_encode($reaccion_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
