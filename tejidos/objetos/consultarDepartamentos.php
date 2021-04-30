<?php

class Departamentos
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "departamentos";

    //propiedades del obejeto
    public $id_departamento;
    public $nombre_dep;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
       $query = "CALL Consultar_todos_tabla_departamentos";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
