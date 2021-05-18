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

    /*
    $stmt->bindParam(":usuario", $this->usuario);
    $stmt->bindParam(":apellido", $this->apellido);
    $stmt->bindParam(":genero", $this->genero);
    $stmt->bindParam(":nacimineto", $this->nacimiento);
    $stmt->bindParam(":municipio", $this->municipio);
    $stmt->bindParam(":tipo", $this->tipo);
    $stmt->bindParam(":estado", $this->estado);
    $stmt->bindParam(":foto", $this->foto);
    $stmt->bindParam(":correo", $this->correo);
    $stmt->bindParam(":pass", $this->pass);
    $stmt->bindParam(":estado1", $this->estado1);
*/
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
