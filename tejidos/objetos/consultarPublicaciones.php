<?php

class Publicaciones
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "publicaciones";

    //propiedades del obejeto
    public $id_publicaciones;
    public $id_usuario;
    public $nombre_usuario;
    public $texto;
    public $imagen;
    public $Fecha;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
        $query = "CALL Consultar_publiacion_por_ID_USUARIO (?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id_publicaciones'];
        $this->idUser = $row['id_usuario'];
        $this->nombre = $row['nombre_usuario'];
        $this->texto = $row['texto'];
        $this->imagen = $row['imagen'];
        $this->fecha = $row['Fecha'];
    }
}
