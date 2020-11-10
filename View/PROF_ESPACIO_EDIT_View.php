<?php

//Clase : PROF_ESPACIO_EDIT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función EDIT.
//-------------------------------------------------------

	class PROF_ESPACIO_EDIT{

		//constructor
		function __construct($valores){	
			$this->valores = $valores;
			
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="EDIT" class="translate"></span><?php //['EDIT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return ;">
			
			 					
			 		
				
					DNI : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '<?php echo $this->valores['DNI']; ?>' onblur="" readonly><br>

					<span key="Codigo Espacio" class="translate"></span><?php //['Codigo Espacio']?> : <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->valores['CODESPACIO']; ?>' onblur="" readonly><br>
				

					<button name="action" value="EDIT" type="submit" ><img src='../View/icons/edit.png'></button>


			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	