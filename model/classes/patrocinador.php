<?php 
	class patrocinador { 

  
    private $id_patrocinador;
    private $nombre;
    private $email;
    private $telefono;
    private $contacto;

//--------------- GETTERS ----------------------------- //
   	 /**
	 * @return string id_patrocinador
	 */
    function get_id_patrocinador( ) {
        return $this->id_patrocinador;
    }

	 /**
	 * @return string nombre
	 */
    function get_nombre( ) {
        return $this->nombre;
    }

	 /**
	 * @return string email
	 */
    function get_email( ) {
        return $this->email;
    }

	 /**
	 * @return string telefono
	 */
    function get_telefono( ) {
        return $this->telefono;
    }

	 /**
	 * @return string contacto
	 */
    function get_contacto( ) {
        return $this->contacto;
    }


//--------------- SETTERS ----------------------------- //
   	/**
	 * @paran string $id_patrocinador identificador
	 */
    function set_id_patrocinador( $id_patrocinador ) {
        $this->id_patrocinador = $id_patrocinador;
    }

   	/**
	 * @paran string $nombre nombre del patrocinador
	 */
    function set_nombre( $nombre ) {
        $this->nombre = $nombre;
    }
	
	/**
	 * @paran string $email Correo Electronico
	 */
    function set_email( $email ) {
        $this->email = $email;
    }

   	/**
	 * @paran string $telefono Telefono del patrocinador
	 */
    function set_telefono( $telefono ) {
        $this->telefono = $telefono;
    }

   	/**
	 * @paran string $contacto Contacto del patrocinador
	 */
    function set_contacto( $contacto ) {
        $this->contacto = $contacto;
    }

}
 ?>