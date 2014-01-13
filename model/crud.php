<?php
include('dbconnect.php');

/**
 * Clase CRUD 
 * Crear, consultar, actualizar y eliminar de la base de datos
 * @package crud
 */
class crud{
	private $conn;
	
	public function __construct() {
		try{
			$this->conn = new dbconnect("aesia_registro", "localhost", "root", "adminadmin");
			$this->conn->connect();
		}catch(dbException $e){
			echo $e;
		}
	}
	
	public function __destruct(){
		unset($this->conexion);
	}
	
	/**
	 * Metodo para insertar datos  
	 *
	 * @param string $table tabla 
	 * @param string $rows columnas, formato ejemplo: "id,nombre,descripcion" 
	 * @param string $params valores, formato ejemplo: "02,dato1,datalles"
	 * @return array
	 * @return dbException
	 */	
	public function create($table, $rows, $params){ 
		try{
			$rows = explode(",", $rows);			
			$values = explode(",", $params);			
			$vals = "";
			for ($i=0; $i<count($rows);$i++){
				$vals .= "?, ";
			}			
			$sql = "INSERT INTO $table (".implode($rows,', ').") VALUES(".rtrim($vals,", ").")";			
			return $this->conn->insert_query($sql, $values);
		}catch(dbException $e){
			return $e;
		}
						
	}
	
	/**
	 * Metodo para insertar multiples valores a una tabla
	 *
	 * @param string $table tabla 
	 * @param string $rows columnas, formato ejemplo: "id,nombre,descripcion"
	 * @param array $sql array de estring con formato [(?,?,?),(?,?,?)] 
	 * @param array $params valores, formato [valor1, valor2, valor3]
	 * @return array
	 * @return dbException
	 */	
	public function insertMultipleRows($table, $rows, $params, $query=""){
		try{
			if(empty($query)===false){
				$sql = $query;
			}else{
				$rows = explode(",", $rows);
				$sql = "INSERT INTO $table (".implode($rows,', ').") VALUES ".implode(',', $params);
			}
			return $this->conn->easyInsertQuery($sql);
		}catch(dbException $e){
			return $e;
		}				
	}
	/**
	 * Metodo para obtener datos  
	 *
	 * @param string | object $obj clase a mapear
	 * @param string $table tabla 
	 * @param string $condicion condiciones para consulta, formato ejemplo: "WHERE id=? order by id" 
	 * @param string $params valores, formato ejemplo: "02,dato1,descripcion"
	 * @return array
	 * @return dbException
	 */
	public function select($obj, $table, $condicion="", $params=""){
		if($condicion!=null && $condicion!=""){
			$sql = "SELECT * FROM $table $condicion";
		}else{
			$sql = "SELECT * FROM $table";
		}		
		
		$values = explode(",", $params); 
		try{
			//$this->conn->connect();
			return $this->conn->select_query($sql, $values, $obj);		
		}catch(dbException $e){
			return $e;
		}
	}
	
	/**
	 * Metodo para actualizar datos	 
	 * @param string $table tabla
	 * @param string $rows nombre de las columnas a actualizar, formato ejemplo: "nombre, descripcion" 
	 * @param string $condicion condiciones para consulta, formato ejemplo: "id=? and nombre = ?" 
	 * @param string $params valores, formato ejemplo: "02,dato1,descripcion"
	 * @return array
	 * @return dbException
	 */	
	public function update($table, $rows, $condicion, $params){
		try{
			$values = explode(",", $params);
			$rows = explode(",", $rows);	
			$sql = "UPDATE $table SET ".implode($rows, " = ?, ")." =? WHERE $condicion";				
			//$this->conn->connect();			
			return $this->conn->update_query($sql, $values);	
		}catch(dbException $e){
			return $e;
		}
	}
	
	/**
	 * Metodo para eliminar datos	 
	 * @param string $table tabla	  
	 * @param string $condicion condiciones para consulta, formato ejemplo: "id=? and nombre = ?" 
	 * @param string $params valores, formato ejemplo: "02,admin"
	 * @return array
	 * @return dbException
	 */		
	public function delete($table, $condicion="", $params=""){
		try{
			$sql = "DELETE FROM $table WHERE $condicion";
			$values = explode(",", $params);
			//$this->conn->connect();
			return $this->conn->delete_query($sql, $values);		
		}catch(dbException $e){
			return $e;
		}
	}
	
}
?>