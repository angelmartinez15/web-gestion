<?php

//Clase : PROFESOR_SHOWCURRENT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función SHOWCURRENT.
//-------------------------------------------------------

	class PROFESOR_SHOWCURRENT{

		//constructor
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="SHOWCURRENT" class="translate"></span><?php //['SHOWCURRENT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/PROFESOR_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
											
					
					DNI : <input type = 'text' name = 'DNI' id = 'DNI' placeholder = '' size = '9' maxlength="9" value = '<?php echo $this->tupla['DNI']; ?>' onblur="" readonly ><br>
				
					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'NOMBREPROFESOR' id = 'NOMBREPROFESOR' placeholder = '' size = '15' maxlength="15" value = '<?php echo $this->tupla['NOMBREPROFESOR']; ?>' readonly ><br>
				
					<span key="Apellidos" class="translate"></span><?php //['Apellidos']?> : <input type = 'text' name = 'APELLIDOSPROFESOR' id = 'APELLIDOSPROFESOR'  size = '30' maxlength="30" value = '<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>' readonly  ><br>
				
					<span key="Area" class="translate"></span><?php //['Area']?> : <input type = 'text' name = 'AREAPROFESOR' id = 'AREAPROFESOR'  size = '60' maxlength="60" value = '<?php echo $this->tupla['AREAPROFESOR']; ?>'  readonly ><br>
				
					<span key="Departamento" class="translate"></span><?php //['Departamento']?> : <input type = 'text' name = 'DEPARTAMENTOPROFESOR' id = 'DEPARTAMENTOPROFESOR' size = '60' maxlength="60" value = '<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>' readonly ><br>
		
			</form>
				
		
			<a href='../Controller/PROFESOR_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	