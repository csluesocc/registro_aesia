/**
 * @author carlos cárcamo
 */

//funcion para llenar tablas con talles y ponencias
function getEventosCtrl($scope, $http, $attrs, $location){	
	$scope.fechas = {
		'lunes':'2013-09-23',
		'martes':'2013-09-24',
		'miercoles':'2013-09-25',
		'jueves':'2013-09-26',
		'viernes':'2013-09-27',
		'congresoInvestigacion':'2013-11-08'
	};
	$scope.url = 'controller/getEventos.php';
	$scope.config = {responseType:"application/x-www-form-urlencoded; charset=UTF-8"};
	$scope.tipo = $attrs.id;
	//console.log($scope.tipo);		
	$scope.init = function(){
		//console.log("call init");
		getDataEventos($scope, $http);	
				
	};
	//redireccionar para tomar asistencia
	$scope.irA = function(dia){		
		window.location.href = "views/asistencia.php?op="+$scope.tipo+"&fecha="+$scope.fechas[dia];
	};
}

//Peticiones ajax para obtener los eventos y talleres de cada dia
function getDataEventos($scope, $http){	
	$scope.getLunes = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.lunes, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataLu = data;
			//console.log(data);
		}).
		error(function(data, status){
			$scope.dataLu = data || "Request failed";
            $scope.status = status; 
            console.log(data, status);			
		});
	};
	
	$scope.getMartes = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.martes, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataMa = data;
		}).
		error(function(data, status){
			$scope.dataMa = data || "Request failed";
            $scope.status = status;
            console.log(data, status); 			
		});
	};
	
	$scope.getMiercoles = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.miercoles, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataMi = data;
		}).
		error(function(data, status){
			$scope.dataMi = data || "Request failed";
            $scope.status = status;
            console.log(data, status); 			
		});
	};
	
	$scope.getJueves = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.jueves, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataJu = data;
		}).
		error(function(data, status){
			$scope.dataJu = data || "Request failed";
            $scope.status = status; 
            console.log(data, status);			
		});
	};
	
	$scope.getViernes = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.viernes, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataVi = data;
		}).
		error(function(data, status){
			$scope.dataVi = data || "Request failed";
            $scope.status = status; 
            console.log(data, status);			
		});
	};
	
	$scope.getCongresoInvestigacion = function(){		
		$http.post($scope.url, {'fecha':$scope.fechas.congresoInvestigacion, 'tipo':$scope.tipo}, $scope.config).
		success(function(data, status){
			$scope.status = status;			
			$scope.dataVi2 = data;
		}).
		error(function(data, status){
			$scope.dataVi2 = data || "Request failed";
            $scope.status = status; 
            console.log(data, status);			
		});
	};
}