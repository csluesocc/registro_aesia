/***************************************************
 * validar campos
 * Version 1.0 (01/06/2013)
 * @author Carlos E. Cárcamo
 ***************************************************/
jQuery.fn.validar = function(R, M){
	//console.log('validando');
	//valores por defecto
	var reglas = {
		cod:{required:true, minLength:7, maxLength:7},		
		text:{required:true, minLength:4, maxLength:50},
		tel:{required:true},
		year:{required:true, Length:4},
		mail:{required:true, minLength:10, maxLength:50},
		number:{required:true, minLength:3, maxLength:4},		
	};
	var mensajes = {
		cod:"*(7 caracteres)",
		text:"*(6 caracteres min)",
		tel:"ejemplo: 2446-9647",
		year:"ejemplo: 1999",
		mail:"example@gmail.com",
		number:"ejemplo: 123"		
	};
	//estilos por defecto
	var _msgStyles = {
		"color":"#FF190D",
		"position":"absolute",					
		"z-index":10
	};
	
	var _errorStyles = {
		"background":"#FFACA4",
		"border":"1px solid #FF190D"
	};
	
	//mostrar el error al usuario
	function mostrarError(element, msj){
		element.css(_errorStyles);
		$("<span id='"+element.attr('id')+"'>"+msj+"</span>")
		.css(_msgStyles).insertAfter(element);
	}
	//remover el mensaje de error
	function limpiarError(element){
		element.removeAttr("style");	
		$("span#"+element.attr('id')).remove();	
	}
	
	
	var _reglas = jQuery.extend(reglas, R);
	var _msj = jQuery.extend(mensajes, M);	
	var valido = true;	
	
	
	//validar codigos/documentos
	if(_reglas.cod){		
		$(this).find("input[valid-type='cod']").each(function(index){
			var element = $(this);			
			$("span#"+element.attr('id')).remove();		
			if(/^\s+$/.test(element.val()) || element.val()=="" || element.val().length < _reglas.text.minLength || element.val().length > _reglas.text.maxLength){				
				mostrarError(element, _msj.cod);
				valido = false;	
			}else{
				limpiarError(element);		
			}			
		});
	}
	
	//validar textos
	if(_reglas.text){		
		$(this).find("input[valid-type='text']").each(function(index){
			var element = $(this);			
			$("span#"+element.attr('id')).remove();		
			if(/^\s+$/.test(element.val()) || element.val()=="" || element.val().length < _reglas.text.minLength || element.val().length > _reglas.text.maxLength){				
				mostrarError(element, _msj.text);
				valido = false;	
			}else{
				limpiarError(element);		
			}			
		});
	}
	
	//validar numeros
	if(_reglas.number){
		$(this).find("input[valid-type='number']").each(function(index){
			var element = $(this);
			$("span#"+element.attr('id')).remove();	
			if(reglas.number.required){				
				if(isNaN(element.val()) || element.val().length < _reglas.number.minLength || element.val().length > _reglas.number.maxLength){
					mostrarError(element, _msj.number);
					valido = false;	
				}else{
					limpiarError(element);	
				}
			}else{
				if(element.val().length>0){
					if(isNaN(element.val()) || element.val().length < _reglas.number.minLength || element.val().length > _reglas.number.maxLength){
						mostrarError(element, _msj.number);
						valido = false;	
					}else{
						limpiarError(element);	
					}
					
				}else{
					limpiarError(element);
				}
			}
		});
	}
	
	//validar año
	if(_reglas.year){	
		$(this).find("input[valid-type='year']").each(function(index){
			var element = $(this);			
			$("span#"+element.attr('id')).remove();	
			if(isNaN(element.val()) || element.val().length != _reglas.year.Length){
				mostrarError(element, _msj.year);
				valido = false;	
			}else{
				limpiarError(element);	
			}
		});
	}
	
	//validar telefono 
	if(_reglas.tel){
		$(this).find("input[valid-type='tel']").each(function(index){
			var element = $(this);
			$("span#"+element.attr('id')).remove();	
			if(!/^\d{4}-\d{4}$/.test(element.val())){
				mostrarError(element, _msj.tel);
				valido = false;	
			}else{
				limpiarError(element);	
			}
		});
	}
	
	//validar e-mail
	if(_reglas.mail){
		$(this).find("input[valid-type='mail']").each(function(index){
			var element = $(this);
			$("span#"+element.attr('id')).remove();
			if(!/^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/.test(element.val())){
				mostrarError(element, _msj.mail);
				valido = false;
			}else{
				limpiarError(element);
			}
		});
	}
	
	
	
	return valido;
};