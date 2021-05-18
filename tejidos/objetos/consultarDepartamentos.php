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
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id_departamento'];
        $this->nombre = $row['nombre_dep'];
    }
}
