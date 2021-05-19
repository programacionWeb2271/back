
<?php

class actualizar
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "login";

    public function __construct($db)
    {
      $this->conn = $db;
    }

    function actualizar()
    {
        $correo = htmlspecialchars(strip_tags($this->correo));
        $pass = htmlspecialchars(strip_tags(sha1($this->pass)));
        $estado = htmlspecialchars(strip_tags($this->estado));
        $id = htmlspecialchars(strip_tags($this->id));

        
        $query = "CALL modificar_tabla_login ('$correo', '$pass', '$estado', '$id')";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
