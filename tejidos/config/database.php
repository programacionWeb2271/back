<?php
class Database{
  
    //creación de credenciales de conexión a la base de datps
    private $host = "localhost";
    private $db_name = "tejido";
    private $username = "root";
    private $password = "";
    public $conn;
  
    //conectarse a la base de datos
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>