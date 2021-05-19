
<?php

class actualizar
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "publicaciones";

    public function __construct($db)
    {
      $this->conn = $db;
    }

    function actualizar()
    {
        $texto = htmlspecialchars(strip_tags($this->texto));
        $imagen = htmlspecialchars(strip_tags($this->imagen));
        $tipo = htmlspecialchars(strip_tags($this->tipo));
        $estado = htmlspecialchars(strip_tags($this->estado));
        $id = htmlspecialchars(strip_tags($this->id));

        
        $query = "CALL Modificar_publicacion ('$texto', '$imagen', '$tipo', '$estado', '$id')";
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
