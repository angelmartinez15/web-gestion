
 <?php

//Clase : CENTRO_Controller
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
	include '../Model/CENTRO_Model.php';	
	include '../View/CENTRO_SHOWALL_View.php';
	include '../View/CENTRO_SEARCH_View.php';
	include '../View/CENTRO_ADD_View.php';
	include '../View/CENTRO_EDIT_View.php';
	include '../View/CENTRO_DELETE_View.php';
	include '../View/CENTRO_SHOWCURRENT_View.php';
	include '../View/MESSAGE_View.php';

	include '../Model/EDIFICIO_Model.php';

	// la función get_data_form() recoge los valores que vienen del formulario por medio de post y la action a realizar, crea una instancia USUARIOS y la devuelve
	
	function get_data_form(){

                $CODCENTRO =  $_POST['CODCENTRO'];
                $CODEDIFICIO =  $_POST['CODEDIFICIO'];
                $NOMBRECENTRO	 =  $_POST['NOMBRECENTRO'];
                $DIRECCIONCENTRO =  $_POST['DIRECCIONCENTRO'];
                $RESPONSABLECENTRO =  $_POST['RESPONSABLECENTRO'];
               

		
		$CENTRO = new CENTRO_Model($CODCENTRO,$CODEDIFICIO,$NOMBRECENTRO,$DIRECCIONCENTRO,$RESPONSABLECENTRO);
		return $CENTRO;
	}

	
	// sino existe la variable action la crea vacia para no tener error de undefined index

	if (!isset($_REQUEST['action'])){
		$_REQUEST['action'] = '';
	}

	// En funcion del action realizamos las acciones necesarias

		switch ($_REQUEST['action']){

			case 'ADD':

				if (!$_POST){ // se invoca la vista de add de centros
					$EDIFICIO = new EDIFICIO_Model('','','','');
					$valores = $EDIFICIO->SEARCH();
					new CENTRO_ADD($valores);
				}
				else{ 
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->ADD(); //se añade el centro a la BD
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;

			case 'DELETE':

				if (!$_POST){ //nos llega el id a eliminar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');
					$valores = $CENTRO->RellenaDatos();
					new CENTRO_DELETE($valores); //se le muestra al usuario los valores de la tupla para que confirme el borrado mediante un form que no permite modificar las variables 
				}
				else{ // llegan los datos confirmados por post y se eliminan
					$CENTRO = get_data_form(); //se recogen los datos del formulario
					$respuesta = $CENTRO->DELETE(); //se muestra al usuario un formulario que no permite modificar las variables, con el objetivo de mostrarle los valores de las tuplas y confirmar el borrado
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}
				break;

			case 'EDIT':

				if (!$_POST){ //nos llega el usuario a editar por get
					$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','',''); // Creo el objeto
					$valores = $CENTRO->RellenaDatos(); // obtengo todos los datos de la tupla
					$EDIFICIO = new EDIFICIO_Model('','','','');
					$valores2 = $EDIFICIO->SEARCH();
					if (is_array($valores))
					{
						new CENTRO_EDIT($valores,$valores2); //invoco la vista de edit con los datos 
							//precargados
					}else
					{
						new MESSAGE($valores, '../Controller/CENTRO_Controller.php');
					}
				}
				else{

					$CENTRO = get_data_form(); //recojo los valores del formulario

					$respuesta = $CENTRO->EDIT(); // update en la bd en la bd
					new MESSAGE($respuesta, '../Controller/CENTRO_Controller.php');
				}

				break;

			case 'SEARCH':

				if (!$_POST){ //se invoca la vista SEARCH de Centro
					new CENTRO_SEARCH();
				}
				else{
					$CENTRO = get_data_form(); //recojemos valores del formulario
					$datos = $CENTRO->SEARCH(); //buscamos en la BD los valores

					$lista = array('NOMBRECENTRO','DIRECCIONCENTRO'); //listamos con los campos que deseamos mostrsr en la vista

					new CENTRO_SHOWALL($lista, $datos, '../index.php');
				}
				break;

			case 'SHOWCURRENT':
			//Enviamos a SHOWCURRENT los valores almacenados en la BD para Centro
				$CENTRO = new CENTRO_Model($_REQUEST['CODCENTRO'],'','','','');
				$valores = $CENTRO->RellenaDatos();
				new CENTRO_SHOWCURRENT($valores);
				break;
			default:
				if (!$_POST){ //Creamos un Model de Centro con todos los campos vacíos para que nos devuelva todos los Centros al hacer la busqueda
					$CENTRO = new CENTRO_Model('','','','','');
				}
				else{
					$CENTRO = get_data_form();
				}
				$datos = $CENTRO->SEARCH(); //buscamos valores en la BD
				$lista = array('NOMBRECENTRO','DIRECCIONCENTRO'); //listamos los campos que deseamos mostrar en la vista.
				new CENTRO_SHOWALL($lista, $datos);
		}

?>