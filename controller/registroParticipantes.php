<?php
	
	include_once('../model/participante.php');
	include_once('../model/crud.php');
	include_once('../model/classes/carrera.php');
	include_once('../model/classes/categoria.php');	
	
	$data = json_decode(file_get_contents("php://input"));
	
	if(count($data)>0 && empty($data->get)===FALSE){
		switch ($data->get) {
			case 'carrera':
				echo json_encode(getCarreras());
				break;
			case 'categoria':
				echo json_encode(getCategorias());
				break;		
			default:				
				break;
		}
	}elseif(empty($_POST)===FALSE){
		echo json_encode(setUser($data));		
	}else{
		$error = array('error' => 'No se enviarion datos...');
		echo json_encode($error);
	}
    
    function getCategorias(){    	    	
    	$db = new crud();
		$result = $db->select('categoria', 'categoria');		
		if(count($result)>0 && empty($result->error)===TRUE){
			foreach ($result as $categoria) {
				$obj_categoria = new categoria();
				$obj_categoria = $categoria;
				$categorias[] = array(
					'id' => $obj_categoria->get_id_categoria(),
					'categoria' => $obj_categoria->get_nombre()
				);
			}
			return $categorias;
		}else{
			$error = array('error' => 'No hay resultados');
			return $error;
		}	
    }
	
	function getCarreras(){    	    	
    	$db = new crud();
		$result = $db->select('carrera', 'carrera');		
		if(count($result)>0 && empty($result->error)===TRUE){
			foreach ($result as $carrera) {
				$obj_carrera = new carrera();
				$obj_carrera = $carrera;
				$carreras[] = array(
					'id' => $obj_carrera->get_id_carrera(),
					'carrera' => $obj_carrera->get_nombre()
				);
			}
			return $carreras;
		}else{
			$error = array('error' => 'No hay resultados');
			return $error;
		}	
    }
	
	function setUser($participante){		
		$params = $_POST['id'].",".$_POST['nombre'].",".$_POST['apellido'].",".$_POST['mail'].",".$_POST['tel'].",".$_POST['insti'];
		$db = new crud();
		$result = $db->create('participante', 'id_participante,nombres,apellidos,email,telefono,institucion', $params);
		if(empty($result->error)===TRUE){			
			$values = $_POST['id'].",".$_POST['carrera'];
			$result = $db->create('participante_carrera', 'id_participante,id_carrera', $values);
			if(empty($result->error)===TRUE){				
				$values = $_POST['id'].",".$_POST['categoria'];
				$result = $db->create('participante_categoria', 'id_participante,id_categoria', $values);
				if(empty($result->error)===TRUE){
					$error = array('Mensaje' => 'Participante registrado correctamente');
					return $error;					
				}else{
					$error = array('error' => 'Problemas al insertar la categoria del participante');
					return $error;
				}
			}else{
				$error = array('error' => 'Problemas al insertar la carrera del participante');
				return $error;
			}			
		}else{
			$error = array('error' => 'Problemas al insertar Participante');
			return $error;
		}
	}	
?>