<?php
/**
 * Clase personalizada para manejo de excepciones producidas al accesar
 * a la base de datos
 * @package dbException
 */
class dbException extends Exception{
	private $mensaje;

	public function __construct( $message, $code) {
		parent::__construct( $message, $code);
	}
	
	/**
	 * Sobre escritura del metodo __toString de la clase Exception
	 * @return array Array asociativo con el mensaje del error
	 */
	function __toString() {
		$this->mensaje = array(
			"error"=> $this->getMessage(),
			"codigo" => $this->getCode(),
			"linea" => $this->getLine(),
			"archivo" => $this->getFile() 
		);		
		
		return $this->mensaje;		
	}
}
?>