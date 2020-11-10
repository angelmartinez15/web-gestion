<?php

//Clase : MESSAGE_View
//Creado el : 03-10-2019
//Creado por: 	dcquf1
//Descripcion: muestra mensajes
//-------------------------------------------------------



class MESSAGE{

	private $string; 
	private $volver;

	//constructor
	function __construct($string, $volver){
		$this->strings = $string;
		$this->volver = $volver;	
		$this->render();
	}
	//funcion que contiene las lineas de codigo que visualizan la información
	function render(){

		include '../View/Header.php';
?>
		<br>
		<br>
		<br>
		<p>
			<?php if(is_array($this->strings)){
				foreach($this->strings as $string){ 
					foreach($string as $string2){ 
			?>
    	<H3>
       <span key="<?php echo $string2 ?>" class="translate"></span><br>
    	<H3>
            <?php 
					}
				} 
		}else{
			?>
            <H3>
                <span key="<?php echo $this->strings ?>" class="translate"></span>
            </H3>
            <?php } ?>

		</p>
		<br>
		<br>
		<br>

<?php

		echo '<a href=\'' . $this->volver . "''><img id=icon src='../View/icons/back.png'></a>";
		include '../View/Footer.php';
	} //fin metodo render

}
