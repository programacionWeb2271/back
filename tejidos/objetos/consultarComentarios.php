<?php

class Comentarios
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "comentarios";

    //propiedades del obejeto
    public $id_comentarios;
    public $id_usuario;
    public $comentario;
    public $fecha;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
       $query = "CALL consultar_comentarios_por_ID_PUBLICACION (?)";
        
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->id);
       $stmt->execute();

       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       $this->id = $row['id_publicaciones'];
       $this->idUser = $row['id_usuario'];
       $this->comentario = $row['comentario'];
       $this->fecha = $row['Fecha'];
    }
}
