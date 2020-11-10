<?php

//Clase : users_index_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: mensaje mostrado de bienvenida
//-------------------------------------------------------



class Index {
	//constructor
	function __construct(){
		$this->render();
	}

	//funcion que contiene las lineas de codigo que visualizan la información
	function render(){
	
		include '../Locale/Strings_SPANISH.php';
		include '../View/Header.php';
?>
		<H1> <span key="BIENVENIDO A LA ARQUITECTURA BASE DE IU" class="translate"></span><?php //['BIENVENIDO A LA ARQUITECTURA BASE DE IU']?> </H1>
		<BR>
		<H2> <span key="En esta web podrás llevar un registro de un Campus Universitario" class="translate"></span><?php //['En esta web podrás llevar un registro de un Campus Universitario']?></H2>
		<img src='../View/img/img.png'>

<?php
		include '../View/Footer.php';
	}

}

?>