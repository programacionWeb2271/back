<?php

class usuarioLog
{

  //conectarse a la base de datos y seleecionar la tabla
  private $conn;
  private $table_name = "usuarios, login";

  //propiedades del obejeto
 
  public function __construct($db)
  {
    $this->conn = $db;
  }
  function usuarioLog()
  {

    $query = "INSERT INTO usuarios SET nombre_usuario=:usuario, apeelido=:apellido, sexo=:genero, Fecha_nacimiento=:nacimiento, id_municipios=:municipio, tipo=:tipo, estado:=estado, foto_perfil:=foto; INSERT INTO login (SELECT LAST_INSERT_ID()), correo=:correo, contrasenia=:pass, estado=:estado1";
    $stmt = $this->conn->prepare($query);

    $this->usuario = htmlspecialchars(strip_tags($this->usuario));
    $this->apellido = htmlspecialchars(strip_tags($this->apellido));
    $this->genero = htmlspecialchars(strip_tags($this->genero));
    $this->nacimiento = htmlspecialchars(strip_tags($this->nacimineto));
    $this->municipio = htmlspecialchars(strip_tags($this->municipio));
    $this->tipo = htmlspecialchars(strip_tags($this->tipo));
    $this->estado = htmlspecialchars(strip_tags($this->estado));
    $this->foto = htmlspecialchars(strip_tags($this->foto));
    $this->correo = htmlspecialchars(strip_tags($this->correo));
    $this->pass = htmlspecialchars(strip_tags(sha1($this->pass)));
    $this->estado1 =htmlspecialchars(strip_tags($this->estado1));

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

    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
