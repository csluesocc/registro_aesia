<?php
    include_once('../model/crud.php');
	include_once('../model/classes/participante.php');
	include_once('../model/classes/carrera.php');
	include_once('../model/classes/participante_carrera.php');
	//include_once('../model/classes/participante_categoria.php');
	include_once('../model/classes/asistencia.php');
	
	$data = json_decode(file_get_contents("php://input"));
	
	if(empty($data)===FALSE){
	
		$tipo_evento = $data->tipo;
		$criterio = $data->criterio;
					
		$db = new crud();				
		
		$result = $db->select('participante', 'participante', $participante_condicion, "1,$criterio");
					
		if(count($result)>0 && empty($result->mensaje) === TRUE){
			$participantes = array();
			$obj = new participante();			
			$obj_carrera_part = new participante_carrera();
			foreach ($result as $paticipante) {
				$obj = $paticipante;		
				$id_participante = $obj->get_id_participante();
				
				//instanciar de nuevo el crud				
				$carreras = $db->select('carrera', 'carrera', "where id_carrera in (select id_carrera from participante_carrera where id_participante =?)", "$id_participante");
											
				if(count($carreras)>0 && empty($carreras->mensaje) === TRUE){
					foreach ($carreras as $carrera) {
						$obj_carrera = new carrera();
						$obj_carrera = $carrera;						
						$_carrera = $obj_carrera->get_nombre();
						break;
					}
				}else{
					$_carrera =  "Indefinido";	
				}	
				
				$participantes[] = array(
					'carnet' => $id_participante,
					'nombre' => utf8_encode($obj->get_nombres()),
					'apellido' => utf8_encode($obj->get_apellidos()),
					'carrera' => $_carrera,
					'mail'=> $obj->get_email()					
				);
			}
			echo json_encode($participantes);
		}else{
			$error = array('error' => 'No hay resultados');
			echo json_encode($error);
		}			
	}else{
		$error = array('error' => 'No se pasaron los datos correctamente');
		echo json_encode($error);
	}
?>