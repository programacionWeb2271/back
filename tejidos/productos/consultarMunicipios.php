<?php
error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarMunicipios.php';

$database = new Database();
$db = $database->getConnection();

$municipio = new Municipios($db);

$municipio->id = isset($_POST['id']) ? $_POST['id'] : die();

$municipio->read();

if ($municipio->id != null) {

    $municipio_arr = array(
        "id_municipios" => $municipio->id,
        "id_departamento" => $municipio->idDep,
        "nombre_mun" => $municipio->nombre
    );
    http_response_code(200);

    echo json_encode($municipio_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")

    );
}
