<?php

//Clase : USUARIOS_SHOWALL_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Muestra la información , de una forma gráfica y entendible, al usuario. En este caso aplicado a la función SHOWALL.
//-------------------------------------------------------

	class USUARIOS_SHOWALL{

		//constructor
		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}
		//funcion que contiene las lineas de codigo que visualizan la información
		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><span key="SHOWALL" class="translate"></span><?php //['SHOWALL']; ?></h1>	
			<br>
			<br>
			<a href='../Controller/USUARIOS_Controller.php?action=ADD'><img src='../View/icons/add.png'></a>
			<tab>
			<a href='../Controller/USUARIOS_Controller.php?action=SEARCH'><img src='../View/icons/search.png'></a>
			<br>
			<br>
		<table>
			<tr>
<?php
		foreach ($this->lista as $titulo) {
?>
				<th key="<?php echo $titulo ?>" class="translate">
					</span><?php //echo $strings[$titulo]; ?></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=EDIT&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/icons/edit.png'> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=DELETE&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/icons/delete.png'> </a>
				</td>
				<td>
					<a href='
						../Controller/USUARIOS_Controller.php?action=SHOWCURRENT&login=
							<?php echo $fila['login']; ?>
							'> <img src='../View/icons/show.png'> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>		
		
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	