
<?php

//Clase : EDIFICIO_Controller
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripción: Intermedia entre modelos y vistas, controlando nuestras interacciones, pidiendo datos al modelo y devolviendóselos a la vista.
//-------------------------------------------------------

	session_start(); //solicito trabajar con la session

	include '../Functions/Authentication.php';

	//Si el login no ha sido introducido de forma correcta
	if (!IsAuthenticated()){
		header('Location:../index.php');
	}

	//Incluimos todas las vistas de la entidad y las necesarias para asegurar la integridad referencial
	
	include '../Model/EDIFICIO_Model.php';
	include '../View/EDIFICIO_SHOWALL_View.php';
	include '../View/EDIFICIO_SEARCH_View.php';
	include '../View/EDIFICIO_ADD_View.php';
	include '../View/EDIFICIO_EDIT_View.php';
	include '../View/EDIFICIO_DELETE_View.php';
	include '../View/EDIFICIO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve

	function get_data_form(){

                $CODEDIFICIO =  $_POST['CODEDIFICIO'];
                $NOMBREEDIFICIO =  $_POST['NOMBREEDIFICIO'];
                $DIRECCIONEDIFICIO	 =  $_POST['DIRECCIONEDIFICIO'];
                $CAMPUSEDIFICIO =  $_POST['CAMPUSEDIFICIO'];
              

		
		$EDIFICIO = new EDIFICIO_Model($CODEDIFICIO,$NOMBREEDIFICIO,$DIRECCIONEDIFICIO,$CAMPUSEDIFICIO);
		return $EDIFICIO;
	}

	
// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ 
					new EDIFICIO_ADD();// se invoca la vista de add de edificio
				}
				else{
					$EDIFICIO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $EDIFICIO->ADD();
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');
					$valores = $EDIFICIO->RellenaDatos();
					new EDIFICIO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$EDIFICIO = get_data_form(); //recogemos datos del formulario
					$respuesta = $EDIFICIO->DELETE(); //le mostramos al usuario los valores de la tupla para  confirmar el borrado mediante un form que no permite modificar las variables 
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el Edificio a editar por get
					$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','',''); // Creo el objeto
					$valores = $EDIFICIO->RellenaDatos(); // obtengo todos los datos de la tupla
					if (is_array($valores))
					{
						new EDIFICIO_EDIT($valores); //invoco la vista de edit con los datos precargados
					}else
					{
						new MESSAGE($valores, '../Controller/EDIFICIO_Controller.php');
					}
				}
				else{

					$EDIFICIO = get_data_form(); //recojo los valores del formulario

					$respuesta = $EDIFICIO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/EDIFICIO_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){
					new EDIFICIO_SEARCH(); //se invoca a la vista de SEARCH de edificio
				}
				else{
					$EDIFICIO = get_data_form(); //recojemos los valores del formulario
					$datos = $EDIFICIO->SEARCH(); //buscamos los valores en la BD

					$lista = array('NOMBREEDIFICIO','DIRECCIONEDIFICIO'); //listamos los campos que queremos mostrar en la vista

					new EDIFICIO_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
			//Enviamos a  SHOWCURRENT los valores almacenados en la BD para Edificio
				$EDIFICIO = new EDIFICIO_Model($_REQUEST['CODEDIFICIO'],'','','');
				$valores = $EDIFICIO->RellenaDatos();
				new EDIFICIO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){
					$EDIFICIO = new EDIFICIO_Model('','','','');
				}
				else{
					$EDIFICIO = get_data_form();
				}
				$datos = $EDIFICIO->SEARCH();
				$lista = array('NOMBREEDIFICIO','DIRECCIONEDIFICIO');
				new EDIFICIO_SHOWALL($lista, $datos);
		}

?>