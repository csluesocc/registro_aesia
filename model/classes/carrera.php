<?php 
	class carrera { 

    private $id_carrera;
    private $nombre;
    private $descripcion;

//--------------- GETTERS ----------------------------- //
	 /**
	 * @return string id_carrera
	 */
    function get_id_carrera( ) {
        return $this->id_carrera;
    }

	/**
	 * @return string id_nombre
	 */
    function get_nombre() {
        return $this->nombre;
    }
	/**
	 * @return string id_descripcion
	 */
    function get_descripcion( ) {
        return $this->descripcion;
    }


//--------------- SETTERS ----------------------------- //
	/**
	 * @paran string $id_carrera identificador
	 */
    function set_id_carrera( $id_carrera ) {
        $this->id_carrera = $id_carrera;
    }
	
 	/**
	 * @paran string $nombre  Nombre de la carrera
	 */
    function set_nombre( $nombre ) {
        $this->nombre = $nombre;
    }

  	/**
	 * @paran string $descripcion  Descripcion
	 */
    function set_descripcion( $descripcion ) {
        $this->descripcion = $descripcion;
    }


} ?>