<?php

//Clase : TITULACION_ADD_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función ADD.
//-------------------------------------------------------

	class TITULACION_ADD{

		//constructor
		function __construct($valores){	
			$this->valores = $valores;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="ADD" class="translate"></span><?php //['ADD']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_titulacion();">
			
			 					
			 		<span key="Codigo Titulacion" class="translate"></span><?php //['Codigo Titulacion']?>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value = '' onblur="comprobarVacio('CODTITULACION')  && comprobarAlfabetico('CODTITULACION')" required><br>

					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?> :<select name="CODCENTRO" >						        
										<?php
											foreach($this->valores as $fila)  { 
										?>
											<option value="<?php echo $fila['CODCENTRO'] ?>"><?php echo $fila['CODCENTRO'] ?></option>
										<?php
										}
										?>
									  </select><br>
					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION'  size = '50' maxlength="50" value = '' onblur="comprobarVacio('NOMBRETITULACION')  && comprobarTexto('NOMBRETITULACION')" required ><br>
					
					<span key="Responsable" class="translate"></span><?php //['Responsable']?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION'  size = '60' maxlength="60" value = '' onblur="comprobarVacio('RESPONSABLETITULACION')  && comprobarTexto('RESPONSABLETITULACION')" required  ><br>
					
					<button name="action" value="ADD" type="submit" ><img src='../View/icons/add.png'></button>

			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	