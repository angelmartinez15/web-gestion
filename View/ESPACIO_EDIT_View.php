<?php
//Clase : ESPACIO_EDIT_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función EDIT.
//-------------------------------------------------------

	class ESPACIO_EDIT{

		//Constructor
		function __construct($tupla,$valores1,$valores2){	
			$this->tupla = $tupla;
			$this->valores1 = $valores1;
			$this->valores2 = $valores2;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="EDIT" class="translate"></span><?php //['EDIT']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_espacio();">
							
					
					<span key="Codigo Espacio" class="translate"></span><?php //['Codigo Espacio']?>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->tupla['CODESPACIO']; ?>' onblur="comprobarVacio('NOMBREPROFESOR')  && comprobarTexto('NOMBREPROFESOR')" readonly ><br>
				
					<span key="Codigo Edificio" class="translate"></span><?php //['Codigo Edificio']?>: <select name="CODEDIFICIO" required>	
										<option value="<?php echo $this->tupla['CODEDIFICIO'] ?>"><?php echo $this->tupla['CODEDIFICIO'] ?></option>
										<?php
											foreach($this->valores1 as $fila1)  { 
										?>
											<option value="<?php echo $fila1['CODEDIFICIO'] ?>"><?php echo $fila1['CODEDIFICIO'] ?></option>
										<?php
										}
										?>
									  </select><br>
				
					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?> :<select name="CODCENTRO" required>	
										<option value="<?php echo $this->tupla['CODCENTRO'] ?>"><?php echo $this->tupla['CODCENTRO'] ?></option>
										<?php
											foreach($this->valores2 as $fila2)  { 
										?>
											<option value="<?php echo $fila2['CODCENTRO'] ?>"><?php echo $fila2['CODCENTRO'] ?></option>
										<?php
										}
										?>
									 </select><br>
				
					<span key="Tipo" class="translate"></span><?php //['Tipo']?>: <select name="TIPO"  required>
								<option value= "<?php echo $this->tupla['TIPO']?>" key="<?php echo $this->tupla['TIPO']?>" class="translate"></option>
								<option value = "Despacho" key="Despacho" class="translate"><?php //['Despacho']?></option>
								<option value = "Laboratorio" key="Laboratorio" class="translate"><?php //['Laboratorio']?></option>
								<option value = "PAS" key="PAS" class="translate"><?php //['PAS']?></option>
						   </select><br>
					
					<span key="Superficie Espacio" class="translate"></span><?php //['Superficie Espacio']?>: <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '4' maxlength="4"  value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' onblur="comprobarVacio('SUPERFICIEESPACIO')  && comprobarEntero('SUPERFICIEESPACIO')" required ><br>
				
					<span key="Numero Inventario Espacio" class="translate"></span><?php //['Numero Inventario Espacio']?>: <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength="8" value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' onblur="comprobarVacio('NUMINVENTARIOESPACIO')  && comprobarEntero('NUMINVENTARIOESPACIO')" required ><br>
				
					<button name="action" value="EDIT" type="submit" ><img src='../View/icons/edit.png'></button>


			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	