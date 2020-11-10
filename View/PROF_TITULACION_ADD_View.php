<?php

//Clase : PROF_TITULACION_ADD_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función ADD.
//-------------------------------------------------------

	class PROF_TITULACION_ADD{

		//constructor
		function __construct($valores1,$valores2){	
			$this->valores1=$valores2;
			$this->valores2=$valores1;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="ADD" class="translate"></span><?php //['ADD']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/PROF_TITULACION_Controller.php' method='post' onsubmit="return comprobar_proftitulacion();">
			
			 					
			 		
				
					DNI : <select name="DNI" required>						        
										<?php
											foreach($this->valores1 as $fila1)  { 
										?>
											<option value="<?php echo $fila1['DNI'] ?>"><?php echo $fila1['DNI'] ?></option>
										<?php
										}
										?>
									  </select><br>

					<span key="Codigo Titulacion" class="translate"></span><?php //['Codigo Titulacion']?> : <select name="CODTITULACION" required>						        
										<?php
											foreach($this->valores2 as $fila2)  { 
										?>
											<option value="<?php echo $fila2['CODTITULACION'] ?>"><?php echo $fila2['CODTITULACION'] ?></option>
										<?php
										}
										?>
									  </select><br>
				
					<span key="Anho Academico" class="translate"></span><?php //['Anho Academico']?> : <input type = 'text' name = 'ANHOACADEMICO' id = 'ANHOACADEMICO' placeholder = '' size = '9' maxlength="9" value = '' onblur="comprobarVacio('ANHOACADEMICO')  && comprobarExp('ANHOACADEMICO')" required ><br>
				

					<button name="action" value="ADD" type="submit" ><img src='../View/icons/add.png'></button>

			</form>
				
		
			<a href='../Controller/PROF_TITULACION_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	