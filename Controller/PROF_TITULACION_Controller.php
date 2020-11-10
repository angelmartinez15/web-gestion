<?php

//Clase : PROF_TITULACION_Controller
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

	include '../Model/PROF_TITULACION_Model.php';
	include '../View/PROF_TITULACION_SHOWALL_View.php';
	include '../View/PROF_TITULACION_SEARCH_View.php';
	include '../View/PROF_TITULACION_ADD_View.php';
	include '../View/PROF_TITULACION_EDIT_View.php';
	include '../View/PROF_TITULACION_DELETE_View.php';
	include '../View/PROF_TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

	include '../Model/PROFESOR_Model.php';
	include '../Model/TITULACION_Model.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve

	function get_data_form(){

                $DNI =  $_POST['DNI'];
                $CODTITULACION =  $_POST['CODTITULACION'];
				$ANHOACADEMICO =  $_POST['ANHOACADEMICO'];
              

		
		$PROF_TITULACION = new PROF_TITULACION_Model($DNI,$CODTITULACION,$ANHOACADEMICO);
		return $PROF_TITULACION;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de Prof_Titulacion

					//pasamos a la vista dos arrays, uno con todos los profesores y otro con todas las titulaciones de la BD
					$TITULACION = new TITULACION_Model('','','','');
					$valores1 = $TITULACION->SEARCH();
					
					$PROFESOR = new PROFESOR_Model('','','','','');
					$valores2 = $PROFESOR->SEARCH();
					new PROF_TITULACION_ADD($valores1,$valores2);
				}
				else{
					$PROF_TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROF_TITULACION->ADD();
					//añadimos una relacion entre Profesor y Titulacion a la BD
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');
					$valores = $PROF_TITULACION->RellenaDatos();
					new PROF_TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROF_TITULACION = get_data_form(); //recogemos los valores del formulario
					$respuesta = $PROF_TITULACION->DELETE(); //mostramos al usuario los valores de la tupla para confirmar el borrado mediante un form que no permite modificar las variables 
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el Prof_Titulacion a editar por get
					$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],''); // Creo el objeto
					$valores = $PROF_TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROF_TITULACION_EDIT($valores); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROF_TITULACION_Controller.php');
					}
				}
				else{

					$PROF_TITULACION = get_data_form(); //recogemos los valores del formulario

					$respuesta = $PROF_TITULACION->EDIT(); // update en la BD
					new MESSAGE($respuesta, '../Controller/PROF_TITULACION_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){
					new PROF_TITULACION_SEARCH(); // se invoca la vista de SEARCH de Prof_Titulacion
				}
				else{
					$PROF_TITULACION = get_data_form(); //recogemos los valores del formulario
					$datos = $PROF_TITULACION->SEARCH(); //buscamos los valores en la BD

					
					$lista = array('DNI','CODTITULACION'); //listamos los campos que queremos mostrar en la vista	

					new PROF_TITULACION_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
			
			//Enviamos a SHOWCURRENT los valores almacenados en la BD para la relación

				$PROF_TITULACION = new PROF_TITULACION_Model($_REQUEST['DNI'],$_REQUEST['CODTITULACION'],'');
				$valores = $PROF_TITULACION->RellenaDatos();
				new PROF_TITULACION_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){ //Creamos un Model de PROF_TITULACION con todos los campos vacíos para que nos devuelvan todas las tuplas al realizar la búsqueda
					$PROF_TITULACION = new PROF_TITULACION_Model('','','');
				}
				else{
					$PROF_TITULACION = get_data_form(); //recogemos los valores del formulario
				}
				$datos = $PROF_TITULACION->SEARCH(); //buscamos los valores en la BD
				$lista = array('DNI','CODTITULACION'); //listamos los campos que queremos mostrar en la vista
				new PROF_TITULACION_SHOWALL($lista, $datos);
		}

?>