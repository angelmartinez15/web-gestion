
<?php

//Clase : USUARIOS_DELETE_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función DELETE.
//-------------------------------------------------------

	class USUARIOS_DELETE{

		//constructor
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
		?>
			<h1><span key="DELETE" class="translate"></span><?php //['DELETE']; ?></h1>	
			<form class="formulario" enctype="multipart/form-data" name = 'Form' action='../Controller/USUARIOS_Controller.php' method='post' onsubmit="return comprobar_registro();">
			
				 	Login : <input type = 'text' name = 'login' id = 'login' size = '9' value = '<?php echo $this->tupla['login']; ?>' readonly><br>

					Password : <input type = 'password' name = 'password' id = 'password' size = '128' value = '<?php echo $this->tupla['password']; ?>' readonly><br>

					DNI : <input type = 'text' name = 'DNI' id = 'DNI' size = '15' value = '<?php echo $this->tupla['DNI']; ?>' readonly><br>

					<span key="Nombre" class="translate"></span><?php //['Nombre']?> : <input type = 'text' name = 'nombre' id = 'nombre' size = '30' value = '<?php echo $this->tupla['nombre']; ?>' readonly><br>

					<span key="Apellidos" class="translate"></span><?php //['Apellidos']?> : <input type = 'text' name = 'apellidos' id = 'apellidos' size = '50' value = '<?php echo $this->tupla['apellidos']; ?>' readonly><br>

					<span key="Telefono" class="translate"></span><?php //['Telefono']?> : <input type = 'text' name = 'telefono' id = 'telefono' size = '11' value = '<?php echo $this->tupla['telefono']; ?>'  readonly><br>

					Email : <input type = 'text' name = 'email' id = 'email'  size = '60' value = '<?php echo $this->tupla['email']; ?>' readonly><br>

					<span key="Fecha de nacimiento" class="translate"></span><?php //['Fecha de nacimiento']?> : <input type = 'text' name = 'FechaNacimiento' id = 'FechaNacimiento'  size = '10' value = '<?php echo $this->tupla['FechaNacimiento']; ?>' readonly><br>

					<span key="Foto personal" class="translate"></span><?php //echo $strings['FotoPersonal']?> : <br><a href="<?php echo ($this->tupla['fotopersonal']); ?>" readonly><?php echo ($this->tupla['fotopersonal']); ?></a><br><br>

					<span key="Sexo" class="translate"></span><?php //['Tipo']?>:<select name="sexo" required>
								<option value= "<?php echo $this->tupla['sexo']?>" key="<?php echo $this->tupla['sexo']?>" class="translate" readonly><?php //[$this->tupla['TIPO']]?> </option></select><br>

					<button name="action" value="DELETE" type="submit" ><img src='../View/icons/delete.png'></button>

			</form>
				
		
			<a href='../Controller/Index_Controller.php'><img src='../View/icons/back.png'> </a>
		
		<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	