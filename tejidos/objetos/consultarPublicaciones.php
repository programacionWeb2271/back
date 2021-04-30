<?php 

class Publicaciones{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "publicaciones";

    //propiedades del obejeto
    public $id_publicaciones;
    public $id_usuario;
    public $texto;
    public $imagen;
    public $Fecha;
    public $tipo;
    public $estado;

    public function __construct($db){
        $this->conn = $db;
    }
    function read()
    {
       $query ="SELECT * FROM " . $this->table_name ."";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
