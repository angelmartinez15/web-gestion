<?php

//Clase : PROFESOR_EDIT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función EDIT.
//-------------------------------------------------------

	class PROFESOR_EDIT{

		//constructor
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="EDIT" class="translate"></span><?php //['EDIT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_profesor();">
					
					
					DNI : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '<?php echo $this->tupla['DNI']; ?>' onblur="comprobarVacio('DNI')  && comprobarDni('DNI')" readonly ><br>

					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '15' maxlength="15" value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' onblur="comprobarVacio('NOMBREPROFESOR')  && comprobarTexto('NOMBREPROFESOR')" required ><br>

					<span key="Apellidos" class="translate"></span><?php //['Apellidos']?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR'  size = '30' maxlength="30" value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' onblur="comprobarVacio('APELLIDOSPROFESOR')  && comprobarTexto('APELLIDOSPROFESOR')" required  ><br>

					<span key="Area" class="translate"></span><?php //['Area']?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR'  size = '60' maxlength="60" value = '<?php echo $this->tupla['AREAPROFESOR']; ?>' onblur="comprobarVacio('AREAPROFESOR')  && comprobarTexto('AREAPROFESOR')" required  ><br>

					<span key="Departamento" class="translate"></span><?php //['Departamento']?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' size = '60' maxlength="60" value ='<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' onblur="comprobarVacio('DEPARTAMENTOPROFESOR')  && comprobarTexto('DEPARTAMENTOPROFESOR')" required><br>

					<button name="action" value="EDIT" type="submit" ><img src='../View/icons/edit.png'></button>


			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	