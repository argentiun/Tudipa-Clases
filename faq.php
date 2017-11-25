<?php


	require_once('soporte.php');

	$usuarioLogueado = $auth->usuarioLogueado($db);

	if ($usuarioLogueado == null) {
		$nombre = "Invitado";
	} else {
		$nombre = $usuarioLogueado->getUsername();
	}
$usuarios = $db->traerTodos();

$title = 'FaQ';
require_once('head.php');
require_once('nav-bar.php');
 ?>

    <!-- Header (cabecera) de la página -->

     <section class="hero">
     <div class="home2-img">
       <div class="mainHeader-placeholder"></div>
       <div class="text-home">
         <h1>Preguntas Frecuentes</h1>
         <h2>¿Como hago para ser parte de TUDIPA?</h2>
         <p class="pregunta">Facil. Lo primero que tenes que hacer es registrarte en nuestra pagina, una vez realizada la registración solo queda que elijas un curso para realizar o postees uno para enseñar.</p>

         <h2>¿Como hago para anotarme a un curso?</h2>
         <p class="pregunta">Haciendo click en "Cursos" en la barra superior de la pagina vas a poder visualizar todas las ofertas que hay disponibles en nuestra web. Una vez que veas lo que te interesa, seleccionalo y hace click en el boton que dice "Comprar". Una vez que estas anotado te llegara un mail por parte del instructor con los detalles del curso.</p>

         <h2>Envio de un mensaje al instructor</h2>
         <p class="pregunta">Para enviarle un mensaje a un instructor solo debes entrar al curso que te interesa y encontraras un link que lee "Mensaje al Instructor".</p>

         <h2>¿De que manera se realizan los cursos?</h2>
         <p class="pregunta">Mediante una serie de videos que el instructor prepara y luego sube a TUDIPA.</p>

         <h2>¿Los videos se pueden descargar?</h2>
         <p class="pregunta">No, los videos se pueden ver reiteradas veces pero no se pueden descargar desde la pagina.</p>

         <h2>¿Puedo anotarme en varios cursos a la vez?</h2>
         <p class="pregunta">Claro que sí! Podes anotarte a todos los cursos que quieras ya que en TUDIPA cada uno estudia a su ritmo.</p>

         <h2>¿Los cursos son presenciales u online?</h2>
         <p class="pregunta">La modalidad del curso queda completamente en manos de cada instructor.</p>

         <h2>¿Que se obtiene al finalizar un curso?</h2>
         <p class="pregunta">En conjunto con el instructor a la finalizacion de un curso se hace entrega de un certificado correspondiente a lo cursado. Al mismo tiempo en tu pagina de perfil te aparecera una "Insignia" que hace referencia a tus cursos finalizados.</p>

				 <h2>¿Puedo enseñar?</h2>
         <p class="pregunta">Sí. Hace click en donde dice "Enseña" en la barra superior y ahí encontraras toda la informacion necesaria sobre como convertirte un instructor en TUDIPA.</p>

				 <h2>¿Como recibo los pagos?</h2>
         <p class="pregunta">Cada mes calcularemos las ventas efectuadas a través de tu curso y recibiras el pago en pesos vía PayPal.</p>

       </div>
      </div>

			<?php
			require_once ('footer.php');
			 ?>
