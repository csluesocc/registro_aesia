<?php 
	class participante_categoria { 

    var $id_participante;

    var $id_categoria;

//--------------- GETTERS ----------------------------- //
	 /**
	 * @return string id_paticipante
	 */
    function get_id_participante( ) {
        return $this->id_participante;
    }

	/**
	 * @return string id_categoria
	 */
    function get_id_categoria( ) {
        return $this->id_categoria;
    }


//--------------- SETTERS ----------------------------- //
	/**
	 * @paran string $id_participante llave foranea
	 */
    function set_id_participante( $id_participante ) {
        $this->id_participante = $id_participante;
    }

    /**
	 * @paran string $id_categoria llave foranea
	 */
    function set_id_categoria( $id_categoria ) {
        $this->id_categoria = $id_categoria;
    }


} 
?>