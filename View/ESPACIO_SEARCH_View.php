<?php
//Clase : ESPACIO_SEARCH_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función SEARCH.
//-------------------------------------------------------

	class ESPACIO_SEARCH{

		//Constructor
		function __construct(){	
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="SEARCH" class="translate"></span><?php //['SEARCH']; ?></h1>	
			<form  class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/ESPACIO_Controller.php' method='post' >
				
			 		<span key="Codigo Espacio" class="translate"></span><?php //['Codigo Espacio']?>: <input type = 'text' name = 'CODESPACIO' id = 'CODESPACIO' placeholder = '' size = '10' maxlength="10" value = '' onblur="" ><br>
					<span key="Codigo Edificio" class="translate"></span><?php //['Codigo Edificio']?>: <input type = 'text' name = 'CODEDIFICIO' id = 'CODEDIFICIO' placeholder = '' size = '10' maxlength="10" value = '' ><br>
					<span key="Codigo Centro" class="translate"></span><?php //['Codigo Centro']?>: <input type = 'text' name = 'CODCENTRO' id = 'CODCENTRO'  size = '10' value = ''  ><br>
					<span key="Tipo" class="translate"></span><?php //['Tipo']?>:  <select name='TIPO' onblur="">
								<option key="<?php echo $this->tupla['TIPO']; ?>" class="translate"> </option>
								<option value = 'Despacho' key="Despacho" class="translate"><?php //['Despacho']?></option>
								<option value = 'Laboratorio' key="Laboratorio" class="translate"><?php //['Laboratorio']?></option>
								<option value = 'PAS' key="PAS" class="translate"><?php //['PAS']?></option>
						   </select><br>
					
					<span key="Superficie Espacio" class="translate"></span><?php //['Superficie Espacio']?>: <input type = 'text' name = 'SUPERFICIEESPACIO' id = 'SUPERFICIEESPACIO' placeholder = '' size = '4' maxlength="4"  value = ''><br>
					<span key="Numero Inventario Espacio" class="translate"></span><?php //['Numero Inventario Espacio']?>: <input type = 'text' name = 'NUMINVENTARIOESPACIO' id = 'NUMINVENTARIOESPACIO' placeholder = '' size = '8' maxlength="8" value = ''><br>
					
					<button name="action" value="SEARCH" type="submit" ><img src='../View/icons/search.png'></button>

			</form>
				
		
			<a href='../Controller/ESPACIO_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	