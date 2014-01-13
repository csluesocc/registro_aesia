<?php
	include('../model/crud.php');
	$data = json_decode(file_get_contents("php://input"));   
	if(empty($data)===FALSE){
		$evento = $data->tipo;
		$criterio = $data->criterio;
		$id_participante = $data->id_participante;
		if(empty($evento)===FALSE && $evento === "taller"){
			$query = "insert into asistencia values ('$criterio', '$id_participante') on duplicate key update id_evento = id_evento and id_participante = id_participante";
		}else{
			$query = " insert into asistencia select id_evento, '$id_participante' from evento where tipo='ponencia' and fecha = '$criterio'";
		}
		$db = new crud();
		echo json_encode($result = $db->insertMultipleRows("", "", "", $query));				
	}else{		
		$error = array('error' => 'No se pasaron los datos correctamente');
		echo json_encode($error);		
	}
?>