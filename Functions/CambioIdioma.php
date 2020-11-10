<?php

//Clase : CambioIdioma
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripción: Mediador en el cambio de idioma, mediante el acceso a los strings.
//-------------------------------------------------------

session_start();
$idioma = $_POST['idioma'];
$_SESSION['idioma'] = $idioma;
header('Location:' . $_SERVER["HTTP_REFERER"]);
?>