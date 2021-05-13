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
include_once '../objetos/consultarReacciones.php';

$database = new Database();
$db = $database->getConnection();

$reaccion = new Reaccion($db);

$reaccion->id = isset($_GET['id']) ? $_GET['id'] : die();

$reaccion->reacciones();

if ( $reaccion->id!=null ) {

        $reaccion_arr = array(
            "id_publicaciones" => $id_publicacion-> id,
            "reaccion" => $reacciones -> reaccion  
        );
        http_response_code(200);

        echo json_encode($reaccion_arr);
       
    } else {
    http_response_code(404);
    var_dump($id_publicacion);
    echo json_encode(
        array("message" => "No se encontro nada")
        
    );
}
