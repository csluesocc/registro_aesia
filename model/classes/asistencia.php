<?php 
class asistencia { 

 
    var $id_evento;
    var $id_participante;

//--------------- GETTERS----------------------------- //
    /**
	 * @return string id_evento
	 */
    function get_id_evento( ) {
        return $this->id_evento;
    }

	/**
	 * @return string id_participante
	 */
    function get_id_participante( ) {
        return $this->id_participante;
    }


//--------------- SETTERS----------------------------- //
     /**
	 * @param string $id_evento llave foranea
	 */
    function set_id_evento( $id_evento ) {
        $this->id_evento = $id_evento;
    }
	/**
	 * @param string $id_participante llave foranea
	 */
    function set_id_participante( $id_participante ) {
        $this->id_participante = $id_participante;
    }



}
 ?>