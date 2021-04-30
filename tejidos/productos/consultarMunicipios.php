<?php
error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarMunicipios.php';

$database = new Database();
$db = $database->getConnection();

$municipio = new Municipios($db);

$stmt = $municipio->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $municipios_arr = array();
    $municipios_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $municipio_item = array(
            "id_departamentos" => $id_departamento,
            "id_municipios" => $id_municipios,
            "nombre_mun" => $nombre_mun            
        );

        array_push($municipios_arr["data"], $municipio_item);
    }

    http_response_code(200);

    echo json_encode($municipios_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")
    );
}
