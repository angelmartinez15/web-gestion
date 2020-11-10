
<?php

//Clase : TITULACION_Controller
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

	include '../Model/TITULACION_Model.php';
	include '../View/TITULACION_SHOWALL_View.php';
	include '../View/TITULACION_SEARCH_View.php';
	include '../View/TITULACION_ADD_View.php';
	include '../View/TITULACION_EDIT_View.php';
	include '../View/TITULACION_DELETE_View.php';
	include '../View/TITULACION_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

	include '../Model/CENTRO_Model.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve

	function get_data_form(){

                $CODTITULACION = $_POST['CODTITULACION'];
                $CODCENTRO = $_POST['CODCENTRO'];
                $NOMBRETITULACION =  $_POST['NOMBRETITULACION'];
                $RESPONSABLETITULACION = $_POST['RESPONSABLETITULACION'];
                
		
		$TITULACION = new TITULACION_Model($CODTITULACION,$CODCENTRO,$NOMBRETITULACION,$RESPONSABLETITULACION);
		return $TITULACION;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de titulacion
					$CENTRO = new CENTRO_Model('','','','','');
					$valores = $CENTRO->SEARCH();
					new TITULACION_ADD($valores);
				}
				else{
					$TITULACION = get_data_form(); //se recogen los datos del formulario
					$respuesta = $TITULACION->ADD();
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');
					$valores = $TITULACION->RellenaDatos();
					new TITULACION_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$TITULACION = get_data_form(); //se recogen los valores del formulario
					$respuesta = $TITULACION->DELETE(); //mostramos al usuario los valores de la tupla para confirmar el borrado mediante un form que no permite modificar las variables
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el usuario a editar por get
					$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','',''); // Creo el objeto
					$valores = $TITULACION->RellenaDatos(); // obtengo todos los datos de la tupla
					$CENTRO = new CENTRO_Model('','','','','');
					$valores2 = $CENTRO->SEARCH();
					if (is_array($valores))
					{
						new TITULACION_EDIT($valores,$valores2);//invoco la vista de edit con los datos precargados
					}else
					{
						new MESSAGE($valores, '../Controller/TITULACION_Controller.php');
					}
				}
				else{

					$TITULACION = get_data_form(); //recogemos los valores del formulario

					$respuesta = $TITULACION->EDIT(); // update en la BD
					new MESSAGE($respuesta, '../Controller/TITULACION_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){
					new TITULACION_SEARCH(); // se invoca la vista de SEARCH de Titulacion
				}
				else{
					$TITULACION = get_data_form(); //recogemos los valores del formulario
					$datos = $TITULACION->SEARCH(); //buscamos los valores en la BD

					$lista = array('NOMBRETITULACION','RESPONSABLETITULACION'); //listamos los campos que queremos mostrar en la vista

					new TITULACION_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
				//Enviamos a SHOWCURRENT los valores almacenados en la BD para la Titulacion

				$TITULACION = new TITULACION_Model($_REQUEST['CODTITULACION'],'','','');
				$valores = $TITULACION->RellenaDatos();
				new TITULACION_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){ //Creamos un Model de TITULACION con todos los campos vacíos para que devuelva todas las titulaciones al realizar la operación de búsqueda
					$TITULACION = new TITULACION_Model('','','','');
				}
				else{
					$TITULACION = get_data_form(); //recogemos los valores del formulario
				}
				$datos = $TITULACION->SEARCH(); //buscamos los valores en la BD
				$lista = array('NOMBRETITULACION','RESPONSABLETITULACION'); //listamos los campos que queremos mostrar en la vista
				new TITULACION_SHOWALL($lista, $datos);
		}

?>