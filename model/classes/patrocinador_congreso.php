<?php class Patrocinador_congreso { 

   
    private $id_pratrocinador;
    private $id_congreso;
    private $descripcion;
    private $monto;

//--------------- GETTERS----------------------------- //
     /**
	 * @return string id_patrocinador
	 */
    function get_id_pratrocinador( ) {
        return $this->id_pratrocinador;
    }


 	 /**
	 * @return string id_congreso
	 */
    function get_id_congreso( ) {
        return $this->id_congreso;
    }

	 /**
	 * @return string descripcion
	 */
    function get_descripcion( ) {
        return $this->descripcion;
    }

	 /**
	 * @return string monto
	 */
    function get_monto( ) {
        return $this->monto;
    }


//--------------- SETTERS ----------------------------- //
	 /**
	 * @paran string $id_patrocinador identificador
	 */
    function set_id_pratrocinador( $id_pratrocinador ) {
        $this->id_pratrocinador = $id_pratrocinador;
    }

  	 /**
	 * @paran string $id_congreso llave foranea
	 */
    function set_id_congreso( $id_congreso ) {
        $this->id_congreso = $id_congreso;
    }

	 /**
	 * @paran string $descripcion Descripcion general
	 */
    function set_descripcion( $descripcion ) {
        $this->descripcion = $descripcion;
    }

	 /**
	 * @paran string $monto $$$$
	 */
    function set_monto( $monto ) {
        $this->monto = $monto;
    }

} 
?>