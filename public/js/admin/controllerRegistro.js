/**
 * @author carlos carcamo
 */

function registroCtlr($scope, $http){
	$scope.url = 'controller/registroParticipantes.php';
	$scope.config = {responseType:"application/x-www-form-urlencoded; charset=UTF-8"};
	
	$scope.init = function(){		
		$scope.getCarreras = function(){
			$http.post($scope.url, {"get":"carrera"}, $scope.config).
			success(function(data, status){
				$scope.carreras = data;
				$scope.status = status;
				//console.log($scope.data);
			}).
			error(function(data, error){
				$scope.data = data || "Request failed";
		        $scope.status = status;
		        console.log($scope.data, $scope.status); 	
			});
		};
		
		$scope.getCategorias = function(){
			$http.post($scope.url, {"get":"categoria"}, $scope.config).
			success(function(data, status){
				$scope.categorias = data;
				$scope.status = status;
				//console.log($scope.data);
			}).
			error(function(data, error){
				$scope.data = data || "Request failed";
		        $scope.status = status;
		        console.log($scope.data, $scope.status); 	
			});
		};
	};
}



function getCarreras($scope, $http){
	$http.post($scope.url).
	success(function(data, status){
		$scope.data = data;
		$scope.status = status;
		//console.log($scope.data);
	}).
	error(function(data, error){
		$scope.data = data || "Request failed";
        $scope.status = status;
        console.log($scope.data, $scope.status); 	
	});
}

function getCategorias($scope, $http){
	
}
$(document).ready(function(){
	$('#enviar').click(function(){
		var form = $('#divForm').validar({
			cod:{required:true, minLength:7, maxLength:7},		
			text:{required:true, minLength:3, maxLength:50},						
			mail:{required:true, minLength:10, maxLength:50},
			number:{required:false, minLength:8, maxLength:8},
		},{
			cod:"",		
			text:"",						
			mail:"",
			number:"",
		});
		
		if(form){
			enviarDatos();			
		}else{
			shake($('#divForm'));
		}
	});
});


function enviarDatos(){	
	var params = {
		'get':'insert',
		'id' : $('#id').val(),
		'nombre': $('#nombre').val(),
		'apellido': $('#apellido').val(),
		'mail' : $('#mail').val(),
		'tel': $('#tel').val(),
		'carrera': $('#carrera').val(),
		'insti' : $('#insti').val(),
		'categoria': $('#categoria').val()		
	};
	
	$.post('controller/registroParticipantes.php', params, function(data){
		var datos = JSON.parse(data) || eval('('+data+')');
		if(datos.length>0 && !(datos.error)){						
			console.log(data);			
		}else{
			console.log(data);
		}
		$("#divForm").find(':input').each(clearForm);
	});
}


function clearForm(){
	switch(this.type) {
				case 'password':
				case 'select-multiple':
				case 'select-one':
				case 'text':
				case 'email':
				case 'tel':
				case 'textarea':
				    $(this).val('');
				    break;
				case 'checkbox':
				case 'radio':
				    this.checked = false;
	}
}
//efecto para sacudir div con el formulario, nota: es improvisado
function shake(element){
	element.animate({
		left:'+=50'
	},75, function(){
		$(this).animate({					
			left:'-=100'
		},75, function(){					
			$(this).animate({						
				left:'+=50'
			},75);
		});
	});
}