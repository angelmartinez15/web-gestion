<?php
//Clase : ESPACIO_DELETE_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función DELETE.
//-------------------------------------------------------

	class ESPACIO_DELETE{

		//Constructor
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="DELETE" class="translate"></span><?php //['DELETE']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' onsubmit="return comprobar_registro();">
						
			 
					<span key="Codigo Espacio" class="translate"></span><?php //['Codigo Espacio']?>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->tupla['CODESPACIO']; ?>' onblur="" readonly ><br>
				
					<span key="Codigo Edificio" class="translate"></span><?php //['Codigo Edificio']?>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' maxlength="10" value = '<?php echo $this->tupla['CODEDIFICIO']; ?>' readonly ><br>
				
					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO'  size = '10' maxlength="10" value = '<?php echo $this->tupla['CODCENTRO']; ?>' readonly ><br>
				
					<span key="Tipo" class="translate"></span><?php //['Tipo']?>:<select name="TIPO" required>
								<option value= "<?php echo $this->tupla['TIPO']?>" key="<?php echo $this->tupla['TIPO']?>" class="translate"><?php //[$this->tupla['TIPO']]?> </option></select><br>
					
					<span key="Superficie Espacio" class="translate"></span><?php //['Superficie Espacio']?>: <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '4' maxlength="4" value = '<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>' readonly><br>
				
					<span key="Numero Inventario Espacio" class="translate"></span><?php //['Numero Inventario Espacio']?>: <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength="8" value = '<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>' readonly><br>

					<button name="action" value="DELETE" type="submit" ><img src='../View/icons/delete.png'></button>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	