<?php
//Clase : Header
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: Cabecera
//-------------------------------------------------------

	include_once '../Functions/Authentication.php';

?>
<html>
<head>

	<script src="../View/vendor/jquery/jquery.min.js"></script>

	<?php include '../View/js/languages.js'?>

	<title key="Ejemplo arquitectura IU" class="translate"></span>
	</title>
	<meta charset="UTF-8">
	<title key="Ejemplo arquitectura IU" class="translate"></span>
	</title>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	<link rel="stylesheet" href="/resources/demos/style.css">
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
	 	 $( function() {
	   	 $( "#datepicker" ).datepicker();
	 	 } );
 	 </script>
 	
	<script type="text/javascript" src="../View/js/validaciones.js"></script> 
	 
	<link rel="stylesheet" type="text/css" href="../View/style.css" media="screen" />

	<!--<script type="text/javascript" src="../View/js/comprobar.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../View/css/JulioCSS-2.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/tcal.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../View/css/modal.css" />
</head>
<body>
		<div id="modal" style="display:none">
	  		<div id="contenido-interno">
	  			<div id="mensajeError"></div>
				<a id="cerrar" href="#" onclick="cerrarModal();">
		       		<img style="cursor: pointer" src="../View/icons/back.png" width="25"/>
				</a>
			</div>
		</div>

<div class = "header">
<header>
	<p style="text-align:center">
		<h1>
			<span key="Portal de Gestión" class="translate"></span>
		</h1>
	</p>
	<br>
	<div id="idiomas">
		<form id="form1" name='form1' action="../Functions/CambioIdioma.php" method="post">
			<button id="SPANISH" class ="lang" style= "padding: 0px 0px; cursor: pointer" name="idioma" value="SPANISH" type="submit" form="form1" onClick='this.form.submit()'value=""><img src='../View/icons/espana.png'></button>
			<button id="GALLAECIAN" class ="lang" style= "padding: 0px 0px; cursor: pointer" name="idioma" value="GALLAECIAN" type="submit" form="form1" onClick='this.form.submit()'value=""><img src='../View/icons/galicia.png'></button>
			<button id="ENGLISH" class ="lang" style= "padding: 0px 0px; cursor: pointer" name="idioma" value="ENGLISH" type="submit" form="form1" onClick='this.form.submit()'value=""><img src='../View/icons/uk.png'></button>
		</form>
	</div>
<?php
	
	if (IsAuthenticated()){
?>
	<span key="Usuario" class="translate"></span> : <?php echo $_SESSION['login']?>
	
	<a href='../Functions/Desconectar.php'>
			<img src='../View/icons/logout.png'>
		</a>
		<br>
		<br>
<?php
	
	}
	else{
?>		<span key="Usuario no autenticado" class="translate"></span> 
<?php		
				/*echo 	'<form name=\'registerForm\' action=\'../Controller/Register_Controller.php\' method=\'post\'>
					<input type=\'submit\' name=\'action\' value=\'REGISTER\'>
				</form>';*/
?>
		<a href='../Controller/Register_Controller.php'><img src='../View/icons/add.png'></a>
		<br>
		<br>
<?php
	}	
?>

<div id = 'main'>
<?php
	//session_start();
	if (IsAuthenticated()){
		include '../View/users_menuLateral.php';
	}
?>

</header>
</div>


<article>
