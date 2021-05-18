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
include_once '../objetos/consultarDepartamentos.php';

$database = new Database();
$db = $database->getConnection();

$departamento = new Departamentos($db);


$departamento->id = isset($_GET['id']) ? $_GET['id'] : die();

$departamento->read();

if ( $departamento->id!=null ) {

        $departamento_arr = array(
            "id_publicaciones" => $departamento-> id,
            "reaccion" => $departamento -> nombre  
        );
        http_response_code(200);

        echo json_encode($departamento_arr);
       
    } else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")
        
    );
}
