<?php

class Usuario {
  private $nombre;
  private $apellido;
  private $username;
  private $edad;
  private $email;
  private $password;
  private $id;

  public function __construct($nombre, $apellido, $username, $edad, $email, $password, $id = null) {
    if ($id == null) {
      $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    else {
      $this->password = $password;
    }

    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->username = $username;
    $this->edad = $edad;
    $this->email = $email;
    $this->password = $password;
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function setEdad($edad) {
    $this->edad = $edad;
  }

  public function getEdad() {
    return $this->edad;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido){
    $this->apellido = $apellido;
  }

  function guardarImagen() {

		if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES["avatar"]["name"];
			$archivo=$_FILES["avatar"]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);

			$miArchivo = dirname(__FILE__);
			$miArchivo = $miArchivo . "/../img/";
			$miArchivo = $miArchivo . $this->email . "." . $ext;

			move_uploaded_file($archivo, $miArchivo);
		}
	}
}

?>
