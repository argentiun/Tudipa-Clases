<?php
include_once("soporte.php");

if ($auth->estaLogueado()) {
	header("Location:index.php");exit;
}

$nombreDefault = "";
$apellidoDefault = "";
$usernameDefault = "";
$edadDefault = "";
$emailDefault = "";


$errores = [];
if ($_POST) {
	$errores = $validator->validarInformacion($_POST, $db);

	if (!isset($errores["nombre"])) {
		$emailDefault = $_POST["nombre"];
	}

	if (!isset($errores["apellido"])) {
		$edadDefault = $_POST["apellido"];
	}

	if (!isset($errores["username"])) {
		$usernameDefault = $_POST["username"];
	}

	if (!isset($error["edad"])) {
		$telefonoDefault = $_POST["edad"];
	}
	if (!isset($error["email"])) {
		$telefonoDefault = $_POST["email"];
	}

	if (count($errores) == 0) {
		$usuario = new Usuario($_POST["nombre"], $_POST["apellido"], $_POST["username"], $_POST["edad"], $_POST["email"], $_POST["password"]);

		$usuario->guardarImagen();
		$usuario = $db->guardarUsuario($usuario);
		// var_dump($usuario);
		// header("Location:gracias.php");exit;
		header("Location:perfildeusuario.php");exit;
	}
}

include("head.php");
?>

<div class="login-page">
<h2>Registración</h2>
</div>

<div class="form3">
<div class="company-info">
	<ul class="errores">
	<?php foreach ($errores as $error) : ?>
		<li>
			<?=$error?>
		</li>
	<?php endforeach; ?>
	</ul>
	<form class="login-form" method="POST" action="registrarse.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="email">Nombre</label>
			<input class="form-control" type="text" name="nombre" id="nombre" value="<?=$nombreDefault?>">
		</div>
		<div class="form-group">
			<label for="email">Apellido</label>
			<input class="form-control" type="text" name="apellido" id="apellido" value="<?=$apellidoDefault?>">
		</div>
		<div class="form-group">
			<label for="email">Username</label>
			<input class="form-control" type="text" name="username" id="username" value="<?=$usernameDefault?>">
		</div>
		<div class="form-group">
			<label for="edad">Edad</label>
			<input class="form-control" type="text" name="edad" id="edad" value="<?=$edadDefault?>">
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input class="form-control" type="text" name="email" id="email" value="<?=$emailDefault?>">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input id="password" class="form-control" type="password" name="password">
		</div>
		<div class="form-group">
			<label for="cpassword">Confirmar Password</label>
			<input id="cpassword" class="form-control" type="password" name="repassword">
		</div>
		<div class="form-group">
			<label for="avatar">Foto de perfil:</label>
			<input id="avatar" class="form-control" type="file" name="avatar">
		</div>
		<div class="form-group">
			<input class="btn btn-success" type="submit">
		</div>
	</form>
</div>
</div>

<?php include ('footer.php'); ?>
