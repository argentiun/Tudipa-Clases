<?php

require_once("db.php");

class Validator {

  public 	function validarLogin($informacion, db $db) {
  		$errores = [];

  		foreach ($informacion as $clave => $valor) {
  			$informacion[$clave] = trim($valor);
  		}
  		if ($informacion["email"] == "") {
  			$errores["email"] = "Debes Completar con tu Email";
  		}
  		else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
  			$errores["mail"] = "Email Invalido";
  		} else if ($db->traerPorMail($informacion["email"]) == NULL) {
  			$errores["mail"] = "El Email no esta Registrado en Nuestra Base";
  		}
  		$usuario = $db->traerPorMail($informacion["email"]);

  		if ($informacion["password"] == "") {
  			$errores["password"] = "Debes Proporcionar tu Contraseña";
  		} else if ($usuario != NULL) {
  			if (password_verify($informacion["password"], $usuario->getPassword()) == false) {
  				$errores["password"] = "Contraseña Invalida";
  			}
  		}
  		return $errores;
  	}




    function validarInformacion($informacion, db $db) {
      $errores = [];

      $nombre=$_FILES["avatar"]["name"];

      $ext = pathinfo($nombre, PATHINFO_EXTENSION);

      if ($_FILES["avatar"]["error"] != 0) {
        $errores["avatar"] = "No se pudo cargar Tu Foto";
      } else if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
        $errores["avatar"] = "El Formato de la Imagen no es Aceptado";
      }

      foreach ($informacion as $clave => $valor) {
        $informacion[$clave] = trim($valor);
      }


      // if (strlen($informacion["nombre"]) <= 4) {
      //   $errores["nombre"] = "Debe Tener mas de 4 Caracteres";
      // }
      //
      // if (strlen($informacion["apellido"]) <= 4) {
      //   $errores["apellido"] = "Debe Tener Mas de 4 Caracteres";
      // }
      //
      // if (strlen($informacion["username"]) <= 5) {
      //   $errores["username"] = "Tu Nombre de Usuario debe tener mas de 5 Caracteres";
      // }
      //
      // if ($informacion["edad"] < 12) {
      //   $errores["edad"] = "Debes Tener Mas de 12 años";
      // }



      if ($informacion["email"] == "") {
        $errores["email"] = "Debes Completar con Tu Email";
      }
      else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
        $errores["mail"] = "Email Invalido";
      } else if ($db->traerPorMail($informacion["email"]) != NULL) {
        $errores["mail"] = "El Usuario Ya Esta Registrado";
      }

      if ($informacion["password"] == "") {
        $errores["password"] = "Escribe Una Contraseña ";
      }

      if ($informacion["repassword"] == "") {
        $errores["repassword"] = "Escribe Nuevamente la Contraseña";
      }

      if ($informacion["password"] != "" && $informacion["repassword"] != "" && $informacion["password"] != $informacion["repassword"]) {
        $errores["password"] = "Las Contraseñas Deben Coincidir";
      }


      return $errores;
    }

}

?>
