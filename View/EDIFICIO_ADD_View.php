<?php

//Clase : EDIFICIO_ADD_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función ADD.
//-------------------------------------------------------

	class EDIFICIO_ADD{

		//constructor
		function __construct(){	
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="ADD" class="translate"></span><?php //['ADD']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/EDIFICIO_Controller.php' method='post' onsubmit="return comprobar_edificio();">
			
			 					
					<span key="Codigo Edificio" class="translate"></span><?php //['Codigo Edificio']?> : <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' maxlength="10" value = '' onblur="comprobarVacio('CODEDIFICIO')  && comprobarAlfabetico('CODEDIFICIO')" required><br>

					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBREEDIFICIO' id = 'NOMBREEDIFICIO'  size = '50' maxlength="50" value = '' onblur="comprobarVacio('NOMBREEDIFICIO')  && comprobarTexto('NOMBREEDIFICIO')" required><br>

					<span key="Direccion" class="translate"></span><?php //['Direccion']?> : <input type = 'text' name = 'DIRECCIONEDIFICIO' id = 'DIRECCIONEDIFICIO'  size = '150' maxlength="150" value = '' onblur="comprobarVacio('DIRECCIONEDIFICIO')  && comprobarAlfabetico('DIRECCIONEDIFICIO')" required ><br>

					<span key="Campus" class="translate"></span><?php //['Campus']?> : <input type = 'text' name = 'CAMPUSEDIFICIO' id = 'CAMPUSEDIFICIO' size = '10' maxlength="10" value = '' onblur="comprobarVacio('CAMPUSEDIFICIO')  && comprobarTexto('CAMPUSEDIFICIO')" required><br>

					<button name="action" value="ADD" type="submit" ><img src='../View/icons/add.png'></button>

			</form>
				
		
			<a href='../Controller/EDIFICIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	