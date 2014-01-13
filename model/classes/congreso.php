<?php 
	class congreso { 

    
    private $id_congreso;
    private $titulo;
    private $slogan;
    private $fecha;

//--------------- GETTERS----------------------------- //
     /**
	 * @return string id_congreso
	 */
    function get_id_congreso( ) {
        return $this->id_congreso;
    }
	
	 /**
	 * @return string titulo
	 */
    function get_titulo( ) {
        return $this->titulo;
    }


    /**
	 * @return string slogan
	 */
    function get_slogan( ) {
        return $this->slogan;
    }


     /**
	 * @return string fecha
	 */
    function get_fecha( ) {
        return $this->fecha;
    }


//--------------- SETTERS ----------------------------- //
    /**
	 * @paran string $id_congreso identificador
	 */
    function set_id_congreso( $id_congreso ) {
        $this->id_congreso = $id_congreso;
    }

    /**
	 * @paran string $titulo Titulo del congreso
	 */
    function set_titulo( $titulo ) {
        $this->titulo = $titulo;
    }

    /**
	 * @paran string $slogan Slogan del congreso
	 */
    function set_slogan( $slogan ) {
        $this->slogan = $slogan;
    }

    /**
	 * @paran string $fecha Fecha del congreso
	 */
    function set_fecha( $fecha ) {
        $this->fecha = $fecha;
    }

} 
?>