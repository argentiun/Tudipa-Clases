<?php

	require_once('soporte.php');

	$usuarioLogueado = $auth->usuarioLogueado($db);

	if ($usuarioLogueado == null) {
		$nombre = "Invitado";
	} else {
		$nombre = $usuarioLogueado->getUsername();
	}
$usuarios = $db->traerTodos();

	if(!estaLog()){
		header('Location: registrarse.php'); exit;
	}

	$elUsuario = traerId($_SESSION['userId']);
	$laImagen = glob('images/userAvatar/' . $elUsuario['email'] . '*');


	if ($_POST) {

		$erroresFinales = validarModificacion($_POST);

		if (empty($erroresFinales)) {

  	modUser($_POST, $_SESSION['userId']);




	header('location: perfildeusuario.php'); exit;

	}
}

	require_once('head.php');
	require_once('nav-bar.php');
?>

<div class="login-page" id="form-with">
 <div class="form3">
	 <form class="login-form"method="POST"  >



		 <span><img src="<?=$laImagen[0];?>" alt="avatar" width="80" style="height: 49px;
			 width: 52px; background-repeat: no-repeat; background-position: 50%; border-radius: 28%; background-size: 100% auto;"></span>

		 <input type="text" name="name" value="<?=$elUsuario['name'];?>">
		 <?php if (isset($erroresFinales['nombre'])): ?>
		 <span style="color: green;"><?=$erroresFinales['nombre'];?></span>
		 <?php endif; ?>



		 <input type="text" name="apellido" value="<?=$elUsuario['lastname'];?>">
		 <?php if (isset($erroresFinales['apellido'])): ?>
		 <span style="color: green;"><?=$erroresFinales['apellido'];?></span>
		 <?php endif; ?>

		 <input type="text" name="username" value="<?=$elUsuario['username'];?>" disabled>
		 <?php if (isset($erroresFinales['username'])): ?>
		 <span style="color: green;"><?=$erroresFinales['username'];?></span>
		 <?php endif; ?>

		 <input type="text" name="edad" placeholder="Edad" value="<?=$elUsuario['edad'];?>">
		 <?php if (isset($erroresFinales['edad'])): ?>
		 <span style="color: green;"><?=$erroresFinales['edad'];?></span>
		 <?php endif; ?>

		 <input type="text" name="email" value="<?=$elUsuario['email'];?>" disabled>

		 <button id="button2" type="submit" style="height: 46px;">Aplicar</button>

		 <a href="index.php"><input id="button2" name="login" type="button" href="index.php" value="Home"></a>

	 </form>
 </div>
</div>


 <?php
 require_once('footer.php');
?>
