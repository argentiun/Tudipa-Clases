<?php

require_once("db.php");
require_once("usuario.php");

class dbMySQL extends db {
  private $conn;

  public function __construct() {
    $dsn = 'mysql:host=localhost;dbname=tudipa;
    charset=utf8mb4';
    $user ="root";
    $pass = "";

    try {
      $this->conn = new PDO($dsn, $user, $pass);
    } catch (Exception $e) {
      echo "La conexion a la base de datos falló: " . $e->getMessage();
    }

  }

  public 	function traerPorMail($email) {
      $query = $this->conn->prepare("SELECT * FROM tudipa");
      $query->bindValue(":email", $email);

      $query->execute();

      // return $query->fetchObject("Usuario");

      $resultado = $query->fetch();

      if (!$resultado) {
        return NULL;
      }

      return new Usuario($resultado["nombre"], $resultado["apellido"], $resultado["username"], $resultado["edad"], $resultado["email"], $resultado["password"], $resultado["id"]);
    }

    public function traerTodos() {
        $query = $this->conn->prepare("SELECT * FROM tudipa");
        $query->execute();

        $arrayDeArrays = $query->fetchAll();

        $arrayDeObjetos = [];

        foreach ($arrayDeArrays as $resultado) {
          $arrayDeObjetos[] = new Usuario($resultado["nombre"], $resultado["apellido"], $resultado["username"], $resultado["edad"], $resultado["email"], $resultado["password"], $resultado["id"]);
        }

        return $arrayDeObjetos;
      }

    public	function guardarUsuario(Usuario $usuario) {
        $query = $this->conn->prepare("Insert into tudipa values( :nombre, :apellido, :username, :edad, :email, :password, null)");

        $query->bindValue(":nombre", $usuario->getNombre());
        $query->bindValue(":apellido", $usuario->getApellido());
        $query->bindValue(":username", $usuario->getUsername());
        $query->bindValue(":edad", $usuario->getEdad());
        $query->bindValue(":email", $usuario->getEmail());
        $query->bindValue(":password", $usuario->getPassword());
        $query->execute();
        // var_dump($query);
        $id = $this->conn->lastInsertId();
        $usuario->setId($id);



        return $usuario;

      }
}

?>
