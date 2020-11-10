<?php

//Clase : PROF_ESPACIO_ADD_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función ADD.
//-------------------------------------------------------

	class PROF_ESPACIO_ADD{

		//constructor
		function __construct($valores1,$valores2){	
			$this->valores1 = $valores2;
			$this->valores2 = $valores1;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="ADD" class="translate"></span><?php //['ADD']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/PROF_ESPACIO_Controller.php' method='post' onsubmit="return ;">
			
			 					
			 		
				
					DNI : <select name="DNI" required>						        
										<?php
											foreach($this->valores1 as $fila1)  { 
										?>
											<option value="<?php echo $fila1['DNI'] ?>"><?php echo $fila1['DNI'] ?></option>
										<?php
										}
										?>
									  </select><br>

					<span key="Codigo Espacio" class="translate"></span><?php //['Codigo Espacio']?> : <select name="CODESPACIO" required>						        
										<?php
											foreach($this->valores2 as $fila2)  { 
										?>
											<option value="<?php echo $fila2['CODESPACIO'] ?>"><?php echo $fila2['CODESPACIO'] ?></option>
										<?php
										}
										?>
									  </select><br>

					<button name="action" value="ADD" type="submit" ><img src='../View/icons/add.png'></button>

			</form>
				
		
			<a href='../Controller/PROF_ESPACIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	