<?php
error_reporting (0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objetos/consultarDepartamentos.php';

$database = new Database();
$db = $database->getConnection();

$departamento = new Departamentos($db);

$stmt = $departamento->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $departamento_arr = array();
    $departamento_arr["data"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $departamento_item = array(
            "id_departamentos" => $id_departamento,
            "nombre_mun" => $nombre_dep            
        );

        array_push($departamento_arr["data"], $departamento_item);
    }

    http_response_code(200);

    echo json_encode($departamento_arr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No se encontro nada")
    );
}
