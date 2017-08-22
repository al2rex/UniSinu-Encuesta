$(document).ready(function(){
	
	
	$("#salir").click(function(){
		$.ajax({
	        url: 'LoginSalirController',
	        type: 'POST',
	        data: 'boton=cerrar',
	    }).done(function (resp) {
	        location.href = 'Login';
	    });
	})
})