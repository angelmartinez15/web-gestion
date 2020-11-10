
<?php

//Clase : PROFESOR_Controller
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

	include '../Model/PROFESOR_Model.php';
	include '../View/PROFESOR_SHOWALL_View.php';
	include '../View/PROFESOR_SEARCH_View.php';
	include '../View/PROFESOR_ADD_View.php';
	include '../View/PROFESOR_EDIT_View.php';
	include '../View/PROFESOR_DELETE_View.php';
	include '../View/PROFESOR_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve

	function get_data_form(){

                $DNI =  $_POST['DNI'];
                $NOMBREPROFESOR =  $_POST['NOMBREPROFESOR'];
                $APELLIDOSPROFESOR	 =  $_POST['APELLIDOSPROFESOR'];
                $AREAPROFESOR =  $_POST['AREAPROFESOR'];
                $DEPARTAMENTOPROFESOR =  $_POST['DEPARTAMENTOPROFESOR'];
               

		
		$PROFESOR = new PROFESOR_Model($DNI,$NOMBREPROFESOR,$APELLIDOSPROFESOR,$AREAPROFESOR,$DEPARTAMENTOPROFESOR);
		return $PROFESOR;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de Profesor
					new PROFESOR_ADD();
				}
				else{
					$PROFESOR = get_data_form(); //se recogen los datos del formulario
					$respuesta = $PROFESOR->ADD();
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
					$valores = $PROFESOR->RellenaDatos();
					new PROFESOR_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$PROFESOR = get_data_form(); //se recogen los valores del formulario
					$respuesta = $PROFESOR->DELETE(); //mostramos al usuario los valores de la tupla para confirmar el borrado mediante un form que no permite modificar las variables 
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el Profesor a editar por get
					$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','',''); // Creo el objeto
					$valores = $PROFESOR->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new PROFESOR_EDIT($valores); //invoco la vista de edit con los datos precargados
					}else
					{
						new MESSAGE($valores, '../Controller/PROFESOR_Controller.php');
					}
				}
				else{

					$PROFESOR = get_data_form(); //recogemos los valores del formulario

					$respuesta = $PROFESOR->EDIT(); // update en la BD
					new MESSAGE($respuesta, '../Controller/PROFESOR_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){
					new PROFESOR_SEARCH(); // se invoca la vista de SEARCH de Profesor
				}
				else{
					$PROFESOR = get_data_form(); //recogemos los valores del formulario
					$datos = $PROFESOR->SEARCH(); //buscamos los valores en la BD
					
					$lista = array('NOMBREPROFESOR','APELLIDOSPROFESOR'); //listamos los campos que queremos mostrar en la vista

					new PROFESOR_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
				//Enviamos a SHOWCURRENT los valores almacenados en la BD para el Profesor

				$PROFESOR = new PROFESOR_Model($_REQUEST['DNI'],'','','','');
				$valores = $PROFESOR->RellenaDatos();
				new PROFESOR_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){ //Creamos un Model de PROFESOR con todos los campos vacíos para que devuelva todos los profesores al realizar la operación de búsqueda
					$PROFESOR = new PROFESOR_Model('','','','','');
				}
				else{
					$PROFESOR = get_data_form(); //recogemos los valores del formulario
				}
				$datos = $PROFESOR->SEARCH();//buscamos los valores en la BD
				
				$lista = array('NOMBREPROFESOR','APELLIDOSPROFESOR'); //listamos los campos que queremos mostrar en la vista
				new PROFESOR_SHOWALL($lista, $datos);
		}

?>