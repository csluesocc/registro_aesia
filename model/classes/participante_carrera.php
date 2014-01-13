<?php
	class participante_carrera { 

   
    private $id_participante;
    private $id_carrera;

//--------------- GETTERS ----------------------------- //
	 /**
	 * @return string id_paticipante
	 */
    function get_id_participante( ) {
        return $this->id_participante;
    }

/**
	 * @return string id_carrera
	 */

    function get_id_carrera( ) {
        return $this->id_carrera;
    }


//--------------- SETTERS ----------------------------- //
	/**
	 * @paran string $id_participante llave foranea
	 */
    function set_id_participante( $id_participante ) {
        $this->id_participante = $id_participante;
    }
 	/**
	 * @paran string $id_carrera llave foranea
	 */
    function set_id_carrera( $id_carrera ) {
        $this->id_carrera = $id_carrera;
    }

} ?>