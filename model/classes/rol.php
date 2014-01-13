<?php 
/**
 * Clase modelo de la tabla rol 
 * @package dbconnect
 */
class rol {  
    private $id_rol;
    private $nombre;
	private $descripcion;
	
	public function __construct() {
		try{
			$this->conn = new dbconnect("aesia_registro", "localhost", "root", "adminadmin");
		}catch(dbException $e){
			echo $e;
		}
	}
	
	public function __destruct(){
		unset($this->conexion);
	}
	

//--------------- GETTERS ----------------------------- //
    /**
	 * @return string id_rol
	 */
    function get_id_rol( ) {
        return $this->id_rol;
    }

	/**
	 * @return string nombre
	 */
    function get_nombre( ) {
        return $this->nombre;
    }
	
	/**
	 * @return string descripcion
	 */
    function get_descripcion () {
        return $this->descripcion;
    }


//--------------- SETTERS ----------------------------- //
     /**
	 * @param string $id_rol identificador
	 */
    function set_id_evento( $id_rol ) {
        $this->id_evento = $id_rol;
    }
	/**
	 * @param string $nombre Nombre del Rol
	 */
    function set_nombre( $nombre ) {
        $this->nombre = $nombre;
    }

	/**
	 * @param string $descripcion Descripcion del Rol
	 */
    function set_descripcion( $descripcion) {
        $this->descripcion = $descripcion;
    }

}
 ?>