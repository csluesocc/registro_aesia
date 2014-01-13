<?php
/**
 * Clase cryp 
 * Clase para encriptar y comparar datos encriptados
 * @package cryp
 */
class cryp{
	
	/**
	 * Metodo para encriptar  
	 *
	 * @param string $data datos a encriptar 
	 * @param int $rounds
	 * @return string	 
	 */
	function encryp_data($data, $rounds=7){
		//Nota este copdigo es para versiones antiguas de php
		// que pueda que no soporten este tipo de encriptacion
		/*if(defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
    		echo "CRYPT_BLOWFISH esta habilitado!<br>";  
  		}*/	
		$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';  
		$salt = sprintf('$2a$%02d$', $rounds);  
		for($i = 0; $i < 22; $i++)  
		{  
 			$salt .= $set_salt[mt_rand(0, 60)];  
		}  
		return crypt($data, $salt);  		
	}
	
	/**
	 * Metodo para comparar  
	 * Compara dos string uno encryptado y otro sin encriptar,
	 * si la cadena es igual al valor real de los datos encriptados
	 * la funcion devolvera True, caso contrario False	 *
	 * @param string $data_hash datos encriptados para comparar
	 * @param string $data datos sin encriptar
	 * @return boolean 	 
	 */
	function are_equals($data_hash, $data){
		return (crypt($data, $data_hash) == $data_hash);
		//return (crypt($data, $data_hash) == $data_hash)? TRUE: FALSE;
	}
	
		
}
?>