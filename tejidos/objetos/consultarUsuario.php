<?php

class Usuarios
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function user()
    {
       $query = "CALL consulta_usuario_por_ID_USUARIO (?)";

       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->id);
       $stmt->execute();

       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       $this->nombre = $row['nombre_usuario'];
       $this->apellido = $row['apellido'];
       $this->genero = $row['sexo'];
       $this->municipio =$row['id_municipios'];
       $this->tipo = $row['tipo'];
       $this->foto =$row['foto_perfil'];
    }
}
