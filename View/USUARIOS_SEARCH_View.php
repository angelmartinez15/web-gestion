<?php

//Clase : USUARIOS_SEARCH_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función SEARCH.
//-------------------------------------------------------

	class USUARIOS_SEARCH{

		//constructor
		function __construct(){	
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="SEARCH" class="translate"></span><?php //['SEARCH']; ?></h1>	
			<form class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' >
			
				 	Login : <input type = 'text' name = 'login' id = 'login' size = '15' maxlength = '15' value = ''  ><br>

					Password : <input type = 'password' name = 'password' id = 'password' size = '128' maxlength = '128' value = '' ><br>

					DNI : <input type = 'text' name = 'DNI' id = 'DNI' size = '9' maxlength = '9' value = ''  ><br>

					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'nombre' id = 'nombre' size = '30' maxlength = '30' value = '' ><br>

					<span key="Apellidos" class="translate"></span><?php //['Apellidos']?> : <input type = 'text' name = 'apellidos' id = 'apellidos' size = '50' maxlength = '50' value = '' ><br>

					<span key="Telefono" class="translate"></span><?php //['Telefono']?> : <input type = 'text' name = 'telefono' id = 'telefono' size = '11' maxlength = '11' value = '' ><br>

					Email : <input type = 'text' name = 'email' id = 'email' size = '60' maxlength = '60' value = '' ><br>

					<span key="Fecha de nacimiento" class="translate"></span><?php //['Fecha de nacimiento']?> : <input type = 'text' name = 'FechaNacimiento' id = 'datepicker' size = '10' maxlength = '10' value = ''  ><br>

					<span key="Foto personal" class="translate"></span><?php //['Foto personal']?> : <input type = 'text' name = 'fotopersonal' id = 'fotopersonal' size = '50' maxlength = '50' value = '' ><br>

					<span key="Sexo" class="translate"></span><?php //['Sexo']?> : <select name = 'sexo' >
								<option value=""></option>
								<option value="hombre" key="Hombre" class="translate"><?php //['Hombre']?></option>
								<option value="mujer" key="Mujer" class="translate"><?php //['Mujer']?></option>
						   </select><br>
						   
					<button name="action" value="SEARCH" type="submit" ><img src='../View/icons/search.png'></button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	