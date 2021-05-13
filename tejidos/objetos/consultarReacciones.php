<?php

class Reaccion
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "reacciones";

    //propiedades del obejeto
    public $id_publicacion;
    public $reaccion;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function reacciones()
    {
       $query = "CALL consultar_reaccciones_por_ID_PUBLIACION (".$id_publicacion.")";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
