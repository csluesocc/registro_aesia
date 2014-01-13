<?php
include_once('excep_handling/dbException.php');

/**
 * Clase para acceso a datos 
 * @package dbconnect
 */
class dbconnect{
		
	//atributos 
	private $host;
	private $user;
	private $pass;
	private $database;
	private $link;
	private $stm;
	private $mysql = False;
  
  	
	function __construct($data, $h="", $u="", $p=""){
		if($h != null && $h != ""){	
			/*
				si se pasan mas parametros que $data, quiere decir que queremos entablar
				una conexion con una base de datos de diferente a SQLite
			*/
			if($data !="" && $data != NULL){
				$this->host = $h;
				$this->user = $u;
				$this->pass = $p;
				$this->database = $data;
				//constantes para MYSQL
				$this->mysql = True;
				define("MYSQL_HOST", "mysql:host=".$this->host.";dbname=".$this->database); 
				define("MYSQL_USER", $this->user);              
				define("MYSQL_PASS", $this->pass);				
	      	}else{
				throw new dbException("Ninguna base de datos ha sido sleccionada", 0);
	      	}
    	}else{
			/*
				si solo se pasa el argumento $data, quiere decir que queremos conectarnos con 
				una base de datos SQLite
			*/
			if($data !="" || $data != null){
				$this->database = $data;
	      	}else{
				throw new dbException("Ninguna base de datos ha sido sleccionada", 0);
	     	}      	
    	}
  	}

	function __destruct(){
		if($this->link){
			//cerrar conexion
			$this->link = null;
		}
	}

	/**
	 * Metodo para conectar a la base de datos.
	 * @throws dbException excepcion personalizada 
	 * @see dbException  
	 */
  	public function connect(){
	    try{
	    	if($this->mysql){
				$this->link = new PDO(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);											
	      	}else{
				$this->link = new PDO("sqlite:".$this->database);
	      	}
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set Errorhandling to Exception
	    }catch(PDOException $e){
	      	//echo "Error: Fallo la conexion: " . $e->getMessage();	      	
			throw new dbException($e->getMessage(), $e->getCode());
	    }
  	}
	
	/**
	 * Metodo para cerrar la conexion actual	    
	 */
	public function close(){
		$this->link = null;
	}
  	
  	/**	 
	 *Metodo para insertar datos 	 
	 * @param string $sql sentencia sql a ejecutar
	 * @param string $values array de parametros
	 * @return array array asociativo 
	 * @throws dbException excepcion personalizada 
	 * @see dbException    
	 */
  	public function insert_query($sql, $values){
	  	try{	
			$this->stm = $this->link->prepare($sql);
			$this->stm->execute($values);			
			$salida = array("mensaje" => "Datos Insertados con exito!!!");			
			$this->stm->closeCursor();
			return $salida;
		}catch(PDOException $e){
			throw new dbException($e->getMessage(), $e->getCode());  		
		}	
  	}
  	
	/**	 
	 *Metodo para actializar datos 	 
	 * @param string $sql sentencia sql
	 * @param array $values array de parametros
	 * @return array array asociativo 
	 * @throws dbException excepcion personalizada 
	 * @see dbException    
	 */
  	public function update_query($sql, $values){
	  	try{		
			$this->stm = $this->link->prepare($sql);
			$this->stm->execute($values);			
			$salida = array("mensaje" => "Datos Modificados con exito!!!");
			$this->stm->closeCursor();			
			return $salida;
	  	}catch(PDOException $e){
			throw new dbException($e->getMessage(), $e->getCode());  		
		}
  	}
  
  	/**	 
	 *Metodo para consultar registros 	 
	 * @param string $sql sentencia sql
	 * @param array $values array de parametros
	 * @param string $obj Nombre de la clase para mapear 
	 * @return array Array de objetos de clase 
	 * @throws dbException excepcion personalizada 
	 * @see dbException    
	 */
  	public function select_query($query, $values, $obj){
  		try{	  		
			//preparamos la consulta
		    $this->stm = $this->link->prepare($query);
			//ejecutamos la consulta
			//retornamos los reultados en forma de array asociativo
			$this->stm->execute($values);
			$result = $this->stm->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $obj);
			$this->stm->closeCursor();
			if(count($result) <= 0){				
				$error = array("error" => "Sin Resultados!!!");
				return $error;						
			}else{				
				return $result;
			}	
  		}catch(PDOException $e){
			throw new dbException($e->getMessage(), $e->getCode());  		
		}	    
  	}
  	
  	/**	 
	 *Metodo eliminar registros
	 * @param string $sql sentencia sql
	 * @param array $values array de parametros
	 * @return array array asociativo 
	 * @throws dbException excepcion personalizada 
	 * @see dbException    
	 */ 
  	public function delete_query($sql, $values){	  	
	  	try{		
			$this->stm = $this->link->prepare($sql);
			$this->stm->execute($values);
			$salida = array("mensaje"=> "Datos borrados con exito\n Numero de filas afectadas: ".$this->stm->rowCount());
			$this->stm->closeCursor();
			return $salida;
		}catch(PDOException $e){
			throw new dbException($e->getMessage(), $e->getCode());  		
		}	 
  	}
	
	public function easyInsertQuery($sql){
		try {		  
		  $this->stm = $this->link->exec($sql);
		  $salida = array("mensaje" => "Datos Insertados con exito!!!");			
			return $salida;
		}
		catch(PDOException $e) {
		  throw new dbException($e->getMessage(), $e->getCode());
		}
	}
}
?>