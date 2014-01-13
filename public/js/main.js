$(document).ready(function (){
	updateMenu();
});

function updateMenu(){
    var url = document.URL;
    url = url.split('/');
    var current = url[url.length-1];    
    var op = current.split('?');
    op = op[op.length-1];
    
    if(op.indexOf('op=ponencia')>-1){
    	$('li').removeClass('active');
    	$('#lnPonencia').addClass('active');    	
    }else if(op.indexOf('op=taller')>-1){
    	$('li').removeClass('active');
    	$('#lnTaller').addClass('active');
    }else{
    	$('li').removeClass('active');
    	$('#lnIndex').addClass('active');
    }    
}