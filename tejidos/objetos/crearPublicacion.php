<?php

class publicacion
{

  //conectarse a la base de datos y seleecionar la tabla
  private $conn;
  private $table_name = "publicaciones";

  //propiedades del obejeto
  public $usuario;
  public $texto;
  public $imagen;
  public $fecha;
  public $tipo;
  public $estado;

  public function __construct($db)
  {
    $this->conn = $db;
  }
  function publicacion()
  {

    $query = "INSERT INTO publicaciones SET id_usuario=:usuario, texto=:texto, imagen=:imagen, tipo=:tipo, estado=:estado";
    $stmt = $this->conn->prepare($query);

    $this->usuario = htmlspecialchars(strip_tags($this->usuario));
    $this->texto = htmlspecialchars(strip_tags($this->texto));
    $this->imagen = htmlspecialchars(strip_tags($this->imagen));
    $this->tipo = htmlspecialchars(strip_tags($this->tipo));
    $this->estado = htmlspecialchars(strip_tags($this->estado));

    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":texto", $this->texto);
    $stmt->bindParam(":imagen", $this->imagen);
    $stmt->bindParam(":tipo", $this->tipo);
    $stmt->bindParam(":estado", $this->estado);

    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
