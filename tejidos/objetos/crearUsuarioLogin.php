<?php

class usuarioLog
{

  //conectarse a la base de datos y seleecionar la tabla
  private $conn;
  private $table_name = "usuarios, login";
 
  public function __construct($db)
  {
    $this->conn = $db;
  }
  function usuarioLogs()
  {
    $usuario = htmlspecialchars(strip_tags($this->usuario));
    $apellido = htmlspecialchars(strip_tags($this->apellido));
    $sexo = htmlspecialchars(strip_tags($this->sexo));
    $municipio = htmlspecialchars(strip_tags($this->municipio));
    $tipo = htmlspecialchars(strip_tags($this->tipo));
    $estado = htmlspecialchars(strip_tags($this->estado));
    $foto = htmlspecialchars(strip_tags($this->foto));
    $correo = htmlspecialchars(strip_tags($this->correo));
    $pass = htmlspecialchars(strip_tags(sha1($this->pass)));
    $login =htmlspecialchars(strip_tags($this->login));

    $query = "CALL Crear_usuario_y_login ('$usuario', '$apellido', '$sexo', '$municipio', '$tipo', '$estado', '$foto', '$correo', '$pass', '$login')";
    $stmt = $this->conn->prepare($query);

    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
