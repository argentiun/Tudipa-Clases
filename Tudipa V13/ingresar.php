<?php

include_once('soporte.php');


if ($auth->estaLogueado()) {
	header("Location:index.php");exit;
}

$errores = [];
if ($_POST) {
	$errores = $validator->validarLogin($_POST, $db);
	if (count($errores) == 0) {
		// LOGUEAR
		$auth->loguear($_POST["email"]);
		if (isset($_POST["recordame"])) {
			//Quiere que lo recuerde
			$auth->recordame($_POST["email"]);
		}
		header("Location:index.php");
	}
}
$title = 'Ingresar';
require_once('head.php');
require_once('nav-bar.php');
 ?>
?>

<div class="jumbotron">
<h1>Login</h1>
</div>

<div class="row">
<div class="col-md-6 col-md-offset-3">
	<ul class="errores">
	<?php foreach ($errores as $error) : ?>
		<li>
			<?=$error?>
		</li>
	<?php endforeach; ?>
	</ul>
	<br>
	<br>
	<br>
	<br>
	<form method="POST" action="ingresar.php" enctype="multipart/form-data">
		<div class="form-group">
			<label for="email">Email</label>
			<input class="form-control" type="text" name="email" id="email" value="">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input id="password" class="form-control" type="password" name="password">
		</div>
		<div class="form-group">
			<label for="recordame">Recordame</label>
			<input type="Checkbox" name="recordame">
		</div>
		<div class="form-group">
			<!-- <input class="btn btn-success" type="submit"> -->
			<button id="button1" type="submit" class="button">Ingresar</button>

		</div>
	</form>
</div>
</div>
<?php include("footer.php"); ?>
