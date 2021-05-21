<?php

class Login
{

    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "login";

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function user()
    {
      
        $correo = htmlspecialchars(strip_tags($this->correo));
        $pass = htmlspecialchars(strip_tags(sha1($this->pass)));
    
       $query = "SELECT * FROM login WHERE correo = '$correo' AND contrasenia = '$pass'";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(1, $this->id);
       $stmt->execute();
       
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       $this->idLog = $row['id_login'];
       $this->idUser = $row['id_usuario'];
       $this->correo = $row['correo'];
       $this->pass = $row['contrasenia'];

       $stmt = $this->conn->prepare($query);

       if ($stmt->execute()) {
         return true;
       }
   
       return false;
    }
}
