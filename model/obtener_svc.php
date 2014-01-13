<?php
//convertir datos a formato JSON
echo json_encode(leerDatos());

//leer datos desde archivo
function leerDatos(){
    $estudiantes = array();
	$fila = 0;
	
    if (($gestor = fopen("db/estudiantes.csv", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {  
        if($fila>0)
           $estudiantes[$fila-1]= array(
							"carnet"=>$datos[0],
           					"apellido"=>utf8_encode($datos[1]),
           					"nombre"=>utf8_encode($datos[2]),
           					"carrera"=>$datos[3]);       
           $fila++;       
        }
        fclose($gestor);
    }else{    		
    	$estudiantes = array(
    		"error" => "No se pudieron cargar los datos"
		);
    }   
    
    return $estudiantes;
}
?>