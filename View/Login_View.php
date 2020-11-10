<?php

//Clase : Login_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Vista del Login
//-------------------------------------------------------

	class Login{

		//constructor
		function __construct(){	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; 
?>
			<h1><span key="Login" class="translate"></span><?php //['Login']; ?></h1>	 
			<form class="formulario" enctype="multipart/forma-data" name = 'Form' action='../Controller/Login_Controller.php' method='post' onsubmit="return comprobar_login();">
		
				 	login : <input type = 'text' name = 'login' id='login' size = '9' maxlength = '9' value = '' onblur="comprobarVacio('login')  && comprobarTexto('login')"  ><br>
				 	
					password : <input type = 'password' name = 'password' id='password' size = '15' maxlength = '15' value = '' onblur="comprobarVacio('password')  && comprobarTexto('password',15)"  ><br>

					<button name="action" value="Login" type="submit" ><img src='../View/icons/login.png'></button>

			</form>
							
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin Login

?>
