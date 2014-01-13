<?php 

	class categoria { 

    
    private $id_categoria;
    private $nombre;
    private $descripcion;

//--------------- GETTERS ----------------------------- //
	 /**
	 * @return string id_categoria
	 */
    function get_id_categoria( ) {
        return $this->id_categoria;
    }

   	/**
	 * @return string id_nombre
	 */
    function get_nombre( ) {
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
	 * @paran string $id_categoria identificador
	 */
    function set_id_categoria( $id_categoria ) {
        $this->id_categoria = $id_categoria;
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

} 
?>