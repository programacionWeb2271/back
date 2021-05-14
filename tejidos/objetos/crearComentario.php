<?php

class Comentarios
{

  //conectarse a la base de datos y seleecionar la tabla
  private $conn;
  private $table_name = "comentarios";

  //propiedades del obejeto
  public $publicacion;
  public $usuario;
  public $comentario;
  public $fecha;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  function Comentario()
  {

    $query = "INSERT INTO" . $this->table_name . " SET id_Publicacion=:publicacion, id_Usuario=:usuario, comentario=:comentario, Fecha=:fecha";
    $stmt = $this->conn->prepare($query);

    $this->publicacion = htmlspecialchars(strip_tags($this->publicacion));
    $this->usuario = htmlspecialchars(strip_tags($this->usuario));
    $this->comentario = htmlspecialchars(strip_tags($this->comentario));
    $this->fecha = htmlspecialchars(strip_tags($this->fecha));

    $stmt->bindParam(":publicacion", $this->publicacion);
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":comentario", $this->comentario);
    $stmt->bindParam(":fecha", $this->fecha);

    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
