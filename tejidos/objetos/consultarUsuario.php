<?php

class Usuarios
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "usuarios";

    //propiedades del obejeto
    public $nombre_usuario;
    public $apellido;
    public $sexo;
    public $Fecha_nacimiento;
    public $tipo;
    public $id_municipios;
    public $foto_perfil;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read()
    {
       $query = "CALL consulta_usuario_por_ID_USUARIO (36)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}