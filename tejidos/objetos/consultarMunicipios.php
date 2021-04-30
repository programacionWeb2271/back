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
       $query = "CALL Consultar_todos_tabla_municipios";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
