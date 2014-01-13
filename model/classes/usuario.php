<?php 
class usuario { 

 	private $login;
   	private $nombre;
	private $pass;
    private $id_rol;
	private $resetPass;

//--------------- GETTERS ----------------------------- //
    /**
	 * @return string login
	 */
    function get_login( ) {
        return $this->login;
    }

	/**
	 * @return string nombre
	 */
    function get_nombre( ) {
        return $this->nombre;
    }
	  /**
	 * @return string pass
	 */
    function get_pass( ) {
        return $this->pass;
    }
	
	  /**
	 * @return string id_rol
	 */
    function get_id_rol( ) {
        return $this->id_rol;
    }
	
	/**
	 * @return string resetPass
	 */
    function get_resetPass () {
        return $this->resetPass;
    }


//--------------- SETTERS ----------------------------- //
     /**
	 * @param string $login identificador
	 */
    function set_login( $login ) {
        $this->login = $login;
    }
	/**
	 * @param string $nombre Nombre del Rol
	 */
    function set_nombre( $nombre ) {
        $this->nombre = $nombre;
    }
	/**
	 * @param string $pass contrase�a
	 */
    function set_pass( $pass) {
        $this->pass = $pass;
    }

	/**
	 * @param string $id_rol llave foranea
	 */
    function set_id_evento( $id_rol ) {
        $this->id_evento = $id_rol;
    }
	/**
	 * @param string $resetPass Reseteo de la contrase�a
	 */
    function set_resetPass( $resetPass) {
        $this->resetPass = $resetPass;
    }

}
?>