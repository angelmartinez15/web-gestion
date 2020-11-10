<?php

//Clase : PROF_ESPACIO_Controller
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripción: Intermedia entre modelos y vistas, controlando nuestras interacciones, pidiendo datos al modelo y devolviendóselos a la vista.
//-------------------------------------------------------

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	//Incluimos todas las vistas de la entidad y las necesarias para asegurar la integridad referencial

	include '../Model/PROF_ESPACIO_Model.php';
	include '../View/PROF_ESPACIO_SHOWALL_View.php';
	include '../View/PROF_ESPACIO_SEARCH_View.php';
	include '../View/PROF_ESPACIO_ADD_View.php';
	include '../View/PROF_ESPACIO_EDIT_View.php';
	include '../View/PROF_ESPACIO_DELETE_View.php';
	include '../View/PROF_ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

	include '../Model/ESPACIO_Model.php';
	include '../Model/PROFESOR_Model.php';
// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve

	function get_data_form(){

                $DNI =  $_POST['DNI'];
                $CODESPACIO =  $_POST['CODESPACIO'];
              

		
		$PROF_ESPACIO = new PROF_ESPACIO_Model($DNI,$CODESPACIO);
		return $PROF_ESPACIO;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de Prof_Espacio

					//pasamos a la vista dos arrays, uno con todos los edificios y otro con todos los centros
					$ESPACIO = new ESPACIO_Model('','','','','','');
					$valores1 = $ESPACIO->SEARCH();
					
					$PROFESOR = new PROFESOR_Model('','','','','');
					$valores2 = $PROFESOR->SEARCH();
					new PROF_ESPACIO_ADD($valores1,$valores2);
				}
				else{
					$PROF_ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);
					$valores = $PROF_ESPACIO->RellenaDatos();
					new PROF_ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_ESPACIO = get_data_form(); //recogemos los valores del formulario
					$respuesta = $PROF_ESPACIO->DELETE(); //mostramos al usuario los valores de la tupla para confirmar el borrado mediante un form que no permite modificar las variables
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el Prof_Espacio a editar por get
					$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']); // Creo el objeto
					$valores = $PROF_ESPACIO->RellenaDatos(); // obtengo todos los datos de la tupla
					
					
					if (is_array($valores))
					{
						new PROF_ESPACIO_EDIT($valores); //invoco la vista de edit con los datos precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_ESPACIO_Controller.php');
					}
				}
				else{

					$PROF_ESPACIO = get_data_form(); //recogemos los valores del formulario

					$respuesta = $PROF_ESPACIO->EDIT(); // update en la BD
					new MESSAGE($respuesta, '../Controller/PROF_ESPACIO_Controller.php');
				}

				break;

			case 'SEARCH':
			
				if (!$_POST){ 
					new PROF_ESPACIO_SEARCH();//invocamos la vista de SEARCH de Prof_Espacio
				}
				else{
					$PROF_ESPACIO = get_data_form(); //recogemos los valores del formulario
					$datos = $PROF_ESPACIO->SEARCH(); //buscamos los valores en la BD

					
					$lista = array('DNI','CODESPACIO'); //listamos los campos que queremos mostrar en la vista

					new PROF_ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;
			case 'SHOWCURRENT':
			//Enviamos a SHOWCURRENT los valores almacenados en la BD para la relación
				$PROF_ESPACIO = new PROF_ESPACIO_Model($_REQUEST['DNI'],$_REQUEST['CODESPACIO']);
				$valores = $PROF_ESPACIO->RellenaDatos();
				new PROF_ESPACIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					//Creamos un Model de Prof_Espacio con todos los campos vacíos para que nos devuelva todas las tuplas al realizar la búsqueda
					$PROF_ESPACIO = new PROF_ESPACIO_Model('','');
				}
				else{
					$PROF_ESPACIO = get_data_form(); //recogemos los valores del formulario
				}
				$datos = $PROF_ESPACIO->SEARCH(); //buscaMOS los valores en la BD
				$lista = array('DNI','CODESPACIO'); //listamos con los campos que queremos mostrar en la vista
				new PROF_ESPACIO_SHOWALL($lista, $datos);
		}

?>