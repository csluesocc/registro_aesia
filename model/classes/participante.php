<?php 

class participante{
		
	private $id_participante;
	private $nombres;
	private $apellidos;
	private $email;
	private $telefono;
	private $institucion;


	/****** Getters ****** /
	
	/**
	 * @return string id
	 */
    function get_id_participante() {
        return $this->id_participante;
    }
	
	/**
	 * @return string nombre
	 */
	function get_nombres() {
		return $this->nombres;
    }
	
	/**
	 * @return string apellido
	 */
	function get_apellidos( ) {
        return $this->apellidos;
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
	 * @return string institucion
	 */
	function get_institucion( ) {
        return $this->institucion;
    }


   
	/****** Setters ******/
  
  	
  	/**
	 * @paran string $id identificador
	 */
    function set_id_participante($id) {
    	$this->id = $id;
    }
    
	/**
	 * @paran string $nombre nombres
	 */
    function set_nombres($nombres) {
       
        $this->nombres = $nombres;
    }
	
	/**
	 * @paran string $apellidos apellidos
	 */
	function set_apellidos($apellidos) {
		$this->apellidos = $apellidos;
    }
    
    /**
	 * @paran string $email correo electronico
	 */
    function set_email($email) {
    	$this->email = $email;
    }
	
	/**
	 * @paran string $telefono telefono
	 */
	function set_telefono($telefono) {
		$this->telefono = $telefono;
    }
	
	/**
	 * @paran string $institucion institucion de procedencia
	 */
	function set_institucion($institucion) {
		$this->institucion = $institucion;
	
    }
	
	
}

 ?>