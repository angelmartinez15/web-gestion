<?php

//Clase : Desconectar
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripción: Se encarga del cierre de sesión, accediendo al Index.php tras cerrarla
//-------------------------------------------------------

session_start();
session_destroy();
header('Location:../index.php');

?>
