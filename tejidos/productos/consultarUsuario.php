<?php
//error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarUsuario.php';

$database = new Database();
$db = $database->getConnection();

$usuario = new Usuarios($db);

$stmt = $usuario->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $usuario_arr = array();
    $usuario_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $usuario_item = array(
            "nombre"=> $nombre_usuario,
            "apellido"=> $apellido,
            "genero"=> $sexo,
            "fecha_nacimiento"=> $Fecha_nacimiento,
            "tipo"=> $tipo,
            "municipio"=> $id_municipios,
            "foto"=>$foto_perfil
        );

        array_push($usuario_arr["data"], $usuario_item);
    }

    http_response_code(200);

    echo json_encode($usuario_arr);
} else {
    http_response_code(401);
    echo json_encode(
        array("message" => "No autorizado")
    );
}
