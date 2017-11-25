<?php


 include_once("soporte.php");

	$mailABuscar = $_GET["email"];

	$usuario = $db->traerPorMail($mailABuscar);

	if ($usuario == null) {
		header("Location:index.php");exit;
	}

	$img = glob("img/" . $mailABuscar . ".*")[0];

 include("head.php");
?>

<div class="jumbotron">
 <h1>Perfil de usuario</h1>
	<img src="<?=$img?>" alt="" width="400">
</div>
<ul>
	<li><?= $usuario->getUsername() ?></li>
</ul>

<?php include("footer.php"); ?>
