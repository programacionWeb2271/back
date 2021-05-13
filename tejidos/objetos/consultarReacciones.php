<?php
 
class Reaccion
{
    //conectarse a la base de datos y seleecionar la tabla
    private $conn;
    private $table_name = "reacciones";

    //propiedades del obejeto
    public $id_publicacion;
    public $reacciones;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    function reacciones()
    {
        $query = "CALL consultar_reaccciones_por_ID_PUBLIACION (?)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this-> id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this -> id = $row['id_publicaciones'];
        $this-> reaccion = $row['reaccion'];
    }
}
