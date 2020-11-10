<?php

//Clase : TITULACION_SEARCH_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función SEARCH.
//-------------------------------------------------------

	class TITULACION_SEARCH{

		//constructor
		function __construct(){	
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="SEARCH" class="translate"></span><?php //['SEARCH']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' >
			
					<span key="Codigo Titulacion" class="translate"></span><?php //['Codigo Titulacion']?>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value = '' onblur="" ><br>

					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10'  maxlength="10" value = ''  ><br>

					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION'  size = '50' maxlength="50" value = ''  ><br>

					<span key="Responsable" class="translate"></span><?php //['Responsable']?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION'  size = '60' maxlength="60" value = ''   ><br>
					
					<button name="action" value="SEARCH" type="submit" ><img src='../View/icons/search.png'></button>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	