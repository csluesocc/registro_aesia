<?php
    include_once('../model/crud.php');
	include_once('../model/classes/evento.php');
	
	$data = json_decode(file_get_contents("php://input"));
	
	if(empty($data)===FALSE){		
			$fecha = $data->fecha;
			$tipo = $data->tipo;
			$db = new crud();			
			$result = $db->select('evento', 'evento', "WHERE fecha=? and tipo=?", "$fecha,$tipo");
			$db = null;			
			if(count($result)>0){
				$eventos = array();
				$obj = new evento();
				foreach ($result as $evento) {
					$obj = $evento;								
					$eventos[] = array(
						'id' => $obj->get_id_evento(),
						'fecha' => $obj->get_fecha(),
						'titulo' => utf8_encode($obj->get_titulo()),
						'area' => utf8_encode($obj->get_area()),
						'lugar' => utf8_encode($obj->get_lugar()),
						'hora_inicio' => $obj->get_hora_inicio(),
						'hora_fin'=> $obj->get_hora_fin()
					);
				}				
				echo json_encode($eventos);
			}else{				
				$error = array('error' => 'No hay resultados');
				echo json_encode($error);
			}			
		}else{
			$error = array('error' => 'No se pasaron los datos correctamente');
			echo json_encode($error);
		}
?>