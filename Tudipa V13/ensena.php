<?php


	require_once('soporte.php');

	$usuarioLogueado = $auth->usuarioLogueado($db);

	if ($usuarioLogueado == null) {
		$nombre = "Invitado";
	} else {
		$nombre = $usuarioLogueado->getUsername();
	}
$usuarios = $db->traerTodos();


$title = 'Ensena';
require_once('head.php');
require_once('nav-bar.php');
 ?>

    <!-- Header (cabecera) de la página -->

     <sectxion class="hedro">
     <div class="home3-img">
       <div class="mainHeader-placeholder"></div>
       <div class="text-home">
         <h1>Trascende tus conocimientos</h1>
				 <br>
         <h2>¡Todo es posible!</h2>
				 <br>
				 <br>
         <h2 style="margin-bottom:40px;" class="pregunta">Si sabes algun oficio y queres compartir tus conocimientos este es tu lugar. En TUDIPA buscamos personas que estes dispuestas a enseñar y asistir a todo aquel interesado en aprender. </h2>

				 <br>
				 <br>
				 <br>
				 <h2 class="pregunta">Los cursos pueden ser online o presenciales. Aquellos que son online se realizan a traves de videos, estos son grabados y subidos por los propios instructores.</h2>

				 <br>
				 <br>
				 <br>

				<h2 class="pregunta">Los cursos pueden ser online o presenciales. Aquellos que son online se realizan a traves de videos, estos son grabados y subidos por los propios instructores.</h2>

				<br>
				<br>
				<br>

				<h2 class="pregunta">Si lo que buscas es aprender no dudes en registrarte y formar parte de TUDIPA.</h2>

				<br>
				<br>



       </div>
      </div>


			<?php
			require_once ('footer.php');
			 ?>
