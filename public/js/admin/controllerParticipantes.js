/**
 * @author carlos cárcamo
 */


//funcion para llenar tablas con los participantes (estudiantes)
function getParticipantesCtrl($scope, $http, $filter, $attrs){
	$scope.url = '../controller/getEstudiantes.php';	
	$scope.config = {responseType:"application/x-www-form-urlencoded; charset=UTF-8"};
	$scope.evento = $attrs.evento;
	$scope.criterio = $attrs.criterio;	
	//console.log($scope.evento, $scope.criterio);
	
	//para paginar	
	$scope.filteredData = [];
    $scope.groupedData = [];
    $scope.dataPerPage = 10;
    $scope.pagedData = [];
    $scope.currentPage = 0;  
    
	$scope.init = function(){		
		$scope.getDataParticipantes = function(){			
			$http.post($scope.url, {'tipo':$scope.evento, 'criterio':$scope.criterio}, $scope.config).			
			success(function(data, status){
				$scope.status = status;
				$scope.filteredData = data;				
				$scope.data = data;
				//console.log($scope.evento, $scope.criterio);
				$scope.groupToPages();
				//console.log($scope.data);
			}).
			error(function(data, status){
				$scope.data = data || "Request failed";
            	$scope.status = status; 
            	console.log(data, status);					
			});
									
		};						
	};
	
	//tomar asistencia
	$scope.tomarAsistencia = function(id_participante){		
		$http.post('../controller/tomar_asistencia.php', {'tipo':$scope.evento, 'criterio':$scope.criterio, 'id_participante':id_participante}, $scope.config).
		success(function(data, status){
			if(data.mensaje){
				console.log(data, status);
				$scope.getDataParticipantes();								
			}else{
				console.log('Problemas al insertat');
			}
		}).
		error(function(data, status){
			console.log(data, status);
		});
	};	
	
	
	var searchMatch = function (item, params) {
        if(!params){
			return true;
        }
        return item.toLowerCase().indexOf(params.toLowerCase()) !== -1;
    };

    //buscar coincidencias
    $scope.search = function () {
        $scope.filteredData = $filter('filter')($scope.data, function (item) {
        	//console.log($scope.data, item);        	
            for(var attr in item) {
            	//console.log(attr);
                if (searchMatch(item[attr], $scope.searchText))
                    return true;
            }
            return false;
        });
       
        $scope.currentPage = 0;
        // now group by pages
        $scope.groupToPages();
    };
    
	//para paginar
	$scope.groupToPages = function () {
        $scope.pagedData = [];
        
        for (var i = 0; i < $scope.filteredData.length; i++) {
            if (i % $scope.dataPerPage === 0) {
                $scope.pagedData[Math.floor(i / $scope.dataPerPage)] = [ $scope.filteredData[i] ];
            } else {
                $scope.pagedData[Math.floor(i / $scope.dataPerPage)].push($scope.filteredData[i]);
            }
        }
    };
    
    
    $scope.range = function (start, end) {
        var ret = [];
        if(!end){
            end = start;
            start = 0;
        }        
        for(var i = start; i < end; i++) {
        	ret.push(i);
        }
        return ret;
    };
    
    $scope.prevPage = function () {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };
    
   	$scope.nextPage = function () {
        if ($scope.currentPage < $scope.pagedData.length - 1) {
            $scope.currentPage++;
        }
    };
    
    $scope.setPage = function () {
        $scope.currentPage = this.n;
    };
}