<?php

//Clase : TITULACION_EDIT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función EDIT.
//-------------------------------------------------------

class TITULACION_EDIT{

		//constructor
		function __construct($tupla,$valores){	
			$this->tupla = $tupla;
			$this->valores = $valores;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="EDIT" class="translate"></span><?php //['EDIT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/TITULACION_Controller.php' method='post' onsubmit="return comprobar_titulacion();">
					
							
			 		<span key="Codigo Titulacion" class="translate"></span><?php //['Codigo Titulacion']?>: <input type = 'text' name = 'CODTITULACION' id = 'CODTITULACION' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->tupla['CODTITULACION']; ?>' onblur="comprobarVacio('CODTITULACION')  && comprobarAlfabetico('CODTITULACION')"  readonly required><br>

					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?> : <select name="CODCENTRO" >
										<option value="<?php echo $this->tupla['CODCENTRO'] ?>"><?php echo $this->tupla['CODCENTRO'] ?></option>
										<?php
											foreach($this->valores as $fila)  { 
										?>
											<option value="<?php echo $fila['CODCENTRO'] ?>"><?php echo $fila['CODCENTRO'] ?></option>
										<?php
										}
										?>
									  </select><br>
					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBRETITULACION' id = 'NOMBRETITULACION'  size = '50' maxlength="50" value = '<?php echo $this->tupla['NOMBRETITULACION']; ?>' onblur="comprobarVacio('NOMBRETITULACION')  && comprobarTexto('NOMBRETITULACION')" required><br>

					<span key="Responsable" class="translate"></span><?php //['Responsable']?> : <input type = 'text' name = 'RESPONSABLETITULACION' id = 'RESPONSABLETITULACION'  size = '60' maxlength="50" value = '<?php echo $this->tupla['RESPONSABLETITULACION']; ?>' onblur="comprobarVacio('RESPONSABLETITULACION')  && comprobarTexto('RESPONSABLETITULACION')" required ><br>


					<button name="action" value="EDIT" type="submit" ><img src='../View/icons/edit.png'></button>


			</form>
				
		
			<a href='../Controller/TITULACION_Controller.php'><img src='../View/icons/back.png'></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	