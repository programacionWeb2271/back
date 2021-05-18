<?php

class Municipios
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "municipios";

    //propiedades del obejeto
    public $id_municipios;
    public $id_departamento;
    public $nombre_mun;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
        $query = "CALL consulta_municipios_por_Id_municipio (?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id_municipios'];
        $this->idDep = $row['id_departamento'];
        $this->nombre = $row['nombre_mun'];
    }
}
