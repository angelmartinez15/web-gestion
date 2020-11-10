
<?php

//Clase : ESPACIO_Controller
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

	include '../Model/ESPACIO_Model.php';
	include '../View/ESPACIO_SHOWALL_View.php';
	include '../View/ESPACIO_SEARCH_View.php';
	include '../View/ESPACIO_ADD_View.php';
	include '../View/ESPACIO_EDIT_View.php';
	include '../View/ESPACIO_DELETE_View.php';
	include '../View/ESPACIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

	include '../Model/EDIFICIO_Model.php';
	include '../Model/CENTRO_Model.php';
// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia ESPACIO y la devuelve

	function get_data_form(){

		$CODESPACIO = $_POST['CODESPACIO'];
		$CODEDIFICIO = $_POST['CODEDIFICIO'];
		$CODCENTRO = $_POST['CODCENTRO'];
		$TIPO = $_POST['TIPO'];
		$SUPERFICIEESPACIO =  $_POST['SUPERFICIEESPACIO'];
		$NUMINVENTARIOESPACIO = $_POST['NUMINVENTARIOESPACIO'];

		
		$espacio = new ESPACIO_Model($CODESPACIO,$CODEDIFICIO,$CODCENTRO,$TIPO,$SUPERFICIEESPACIO,$NUMINVENTARIOESPACIO);
		return $espacio;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		Switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de Espacio

					//Le damos a la vista dos arrays de datos, uno con todos los centros y otro con todos los edificios
					$EDIFICIO  =  new EDIFICIO_Model('','','','');
					$valores1  =  $EDIFICIO->SEARCH();
					$CENTRO  =  new CENTRO_Model('','','','','');
					$valores2  =  $CENTRO->SEARCH();
					new ESPACIO_ADD($valores1, $valores2);
				}
				else{
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->ADD();
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');
					$valores = $ESPACIO->RellenaDatos();
					new ESPACIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$ESPACIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $ESPACIO->DELETE(); //mostramos al usuario los valores de la tupla para confirmar el borrado, mediante un form que no permite modificar las variables 
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el Espacio a editar por get
					$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','',''); // Creo el objeto
					$valores = $ESPACIO->RellenaDatos($_REQUEST['CODESPACIO']); // obtengo todos los datos de la tupla
					
					//Le damos a la vista dos arrays de datos, uno con todos los centros y otro con todos los edificios
					$EDIFICIO = new EDIFICIO_Model('','','','');
					$valores1  =  $EDIFICIO->SEARCH();
					$CENTRO  =  new CENTRO_Model('','','','','');
					$valores2  =  $CENTRO->SEARCH();

					if (is_array($valores))
					{
						new ESPACIO_EDIT($valores, $valores1, $valores2); //invoco la vista de edit con los datos precargados
					}else
					{
						new MESSAGE($valores, '../Controller/ESPACIO_Controller.php');
					}
				}
				else{

					$ESPACIO = get_data_form(); //recogemos los valores del formulario

					$respuesta = $ESPACIO->EDIT(); // update en la BD
					new MESSAGE($respuesta, '../Controller/ESPACIO_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){ 
					new ESPACIO_SEARCH();//se invoca la vista SEARCH de Espacio
				}
				else{
					$ESPACIO = get_data_form(); //recogemos los valores del formulario
					$datos = $ESPACIO->SEARCH();//buscamos los valores en la bd

					
					$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO'); //listamos los campos que deseamos mostrar en la vista
					new ESPACIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
			//Enviamos a SHOWCURRENT los valores almacenados en la BD para Espacio

				$ESPACIO = new ESPACIO_Model($_REQUEST['CODESPACIO'],'','','','','');
				$valores = $ESPACIO->RellenaDatos();
				new ESPACIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){ //Creamos un Model de Espacio con los campos vacíos para devolver todos los Espacios al realizar la busqueda
					$ESPACIO = new ESPACIO_Model('','','','','','');
				}
				else{
					$ESPACIO = get_data_form(); //recogemos los valores del formulario
				}
				$datos = $ESPACIO->SEARCH(); //buscamos los valores en la BD
				$lista = array('CODESPACIO','CODEDIFICIO','CODCENTRO'); //lista con los campos que deseamos mostrar en la vista
				new ESPACIO_SHOWALL($lista, $datos);
		}

?>
