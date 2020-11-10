<?php

//Clase : users_menuLateral_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: menú para seleccionar entre las diferentes opciones
//-------------------------------------------------------


?>

	<nav>
		<ul>
		
				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/USUARIOS_Controller.php')) {?> class="active" <?php } ?> href='../Controller/USUARIOS_Controller.php'>
						<span key="Gestion Usuarios" class="translate"></span><?php //['Gestion Usuarios']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/EDIFICIO_Controller.php')) {?> class="active" <?php } ?> href='../Controller/EDIFICIO_Controller.php'>
							<span key="Gestion Edificios" class="translate"></span><?php //['Gestion Edificios']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/ESPACIO_Controller.php')) {?> class="active" <?php } ?> href='../Controller/ESPACIO_Controller.php'>
						<span key="Gestion Espacios" class="translate"></span><?php //['Gestion Espacios']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/CENTRO_Controller.php')) {?> class="active" <?php } ?> href='../Controller/CENTRO_Controller.php'>
						<span key="Gestion Centros" class="translate"></span><?php //['Gestion Centros']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/TITULACION_Controller.php')) {?> class="active" <?php } ?> href='../Controller/TITULACION_Controller.php'>
						<span key="Gestion Titulaciones" class="translate"></span><?php //['Gestion Titulaciones']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/PROFESOR_Controller.php')) {?> class="active" <?php } ?> href='../Controller/PROFESOR_Controller.php'>
						<span key="Gestion Profesores" class="translate"></span><?php //['Gestion Profesores']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/PROF_ESPACIO_Controller.php')) {?> class="active" <?php } ?> href='../Controller/PROF_ESPACIO_Controller.php'>
						<span key="Gestion Profesores Espacio" class="translate"></span><?php //['Gestion Profesores Espacio']; ?>
					</a>
				</li>

				<li>
					<a <?php if(strpos($_SERVER['REQUEST_URI'], '/PROF_TITULACION_Controller.php')) {?> class="active" <?php } ?> href='../Controller/PROF_TITULACION_Controller.php'>
						<span key="Gestion Profesores Titulacion" class="translate"></span><?php //['Gestion Profesores Titulacion']; ?>
					</a>
				</li>

								
		</ul>
	</nav>