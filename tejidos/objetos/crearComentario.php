<?php

class Comentario
{

  //conectarse a la base de datos y seleecionar la tabla
  private $conn;
  private $table_name = "comentarios";

  //propiedades del obejeto
  public $publicacion;
  public $usuario;
  public $comentario;
 // public $fecha;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  function Comentario()
  {

    $query = "INSERT INTO comentarios SET id_publicaciones=:publicacion, id_usuario=:usuario, comentario=:comentario";
    $stmt = $this->conn->prepare($query);

    $this->publicacion = htmlspecialchars(strip_tags($this->publicacion));
    $this->usuario = htmlspecialchars(strip_tags($this->usuario));
    $this->comentario = htmlspecialchars(strip_tags($this->comentario));

    $stmt->bindParam(":publicacion", $this->publicacion);
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":comentario", $this->comentario);
    
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
