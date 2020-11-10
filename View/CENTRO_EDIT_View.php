<?php

//Clase : CENTRO_EDIT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función EDIT.
//-------------------------------------------------------

	class CENTRO_EDIT{

		//constructor
		function __construct($tupla,$valores){	
			$this->valores = $valores;
			$this->tupla = $tupla;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="EDIT" class="translate"></span><?php //['EDIT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/CENTRO_Controller.php' method='post' onsubmit="return comprobar_centro();">
									
			 		<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?> : <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->tupla['CODCENTRO']; ?>' onblur="comprobarVacio('CODCENTRO')  && comprobarAlfabetico('CODCENTRO')" readonly><br>

					<span key="Codigo Edificio" class="translate"></span><?php //['Codigo Edificio']?> : <select name="CODEDIFICIO" required>	
										<option value="<?php echo $this->tupla['CODEDIFICIO'] ?>"><?php echo $this->tupla['CODEDIFICIO'] ?></option>
										<?php
										foreach($this->valores as $fila)  { 
										?>
										<option value="<?php echo $fila['CODEDIFICIO'] ?>"><?php echo $fila['CODEDIFICIO'] ?></option>
										<?php
										}
										?>
									  </select><br>
					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBRECENTRO' id = 'NOMBRECENTRO'  size = '50' maxlength="50" value = '<?php echo $this->tupla['NOMBRECENTRO']; ?>' onblur="comprobarVacio('NOMBRECENTRO')  && comprobarTexto('NOMBRECENTRO')" required><br>

					<span key="Direccion" class="translate"></span><?php //['Direccion']?> : <input type = 'text' name = 'DIRECCIONCENTRO' id = 'DIRECCIONCENTRO'  size = '150' maxlength="150" value = '<?php echo $this->tupla['DIRECCIONCENTRO']; ?>' onblur="comprobarVacio('DIRECCIONCENTRO')  && comprobarAlfabetico('DIRECCIONCENTRO')" required ><br>

					<span key="Responsable" class="translate"></span><?php //['Responsable']?> : <input type = 'text' name = 'RESPONSABLECENTRO' id = 'RESPONSABLECENTRO' size = '60' maxlength="60" value = '<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' onblur="comprobarVacio('RESPONSABLECENTRO')  && comprobarTexto('RESPONSABLECENTRO')" required><br>

					<button name="action" value="EDIT" type="submit" ><img src='../View/icons/edit.png'></button>

			</form>

		
			<a href='../Controller/CENTRO_Controller.php'><img src='../View/icons/back.png'></a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	