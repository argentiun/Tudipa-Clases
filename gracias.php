<?php


	require_once('soporte.php');

	$usuarioLogueado = $auth->usuarioLogueado($db);

	if ($usuarioLogueado == null) {
		$nombre = "Invitado";
	} else {
		$nombre = $usuarioLogueado->getUsername();
	}
$usuarios = $db->traerTodos();
//variable $usuario[] tiene la info del usuario


$title = 'TuDiPa - Estudia a tu Ritmo';
require_once('head.php');
require_once('nav-bar.php');
 ?>
<body>

	<div class="gracias">
		<div class="gracias-cuerpo">
			<div class="mainHeader-placeholder"></div>
			<div class="text-home">

				<h1 style="margin-bottom: 60px;">
				<!-- <?php echo $_COOKIE['bienvenidname']; ?> -->
				<!-- <?php echo $_COOKIE['bienvenidolastname']; ?> -->
				<br>
					¡Muchas gracias por registrarte!
				</h1>

				<div class="">
					<a href="index.php"><input style="width: 130px; margin-bottom: 20px;" id="button2" name="login" type="button" href="index.php" value="Home"></a>

					<br>

					<a href="ingresar.php"><input style="width: 130px;" id="button2" name="login" type="button" href="ingresar.php" value="Ingresar"></a>
				</div>




			</div>
		 </div>
	</div>




</body>

<?php
require_once ('footer.php');
 ?>
