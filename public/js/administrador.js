$(document).ready(function(){

	$('#identificacion').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
    });

	$("#salir").click(function(){
		$.ajax({
	        url: 'LoginSalirController',
	        type: 'POST',
	        data: 'boton=cerrar',
	    }).done(function (resp) {
	        location.href = 'Login';
	    });
	})

	$("#registrarUsuario").click(function(){
		$('#registrarUsuario').attr("disabled", true);
		var formDato = $("#formUsuarios").serialize();
		$.ajax({
	        url: 'registrarUsuariosController',
	        type: 'post',
	        data: formDato,
	        beforeSend: function () {

	        }
	    }).done(function (response) {
	    	$('#registrarUsuario').attr("disabled", false);
	        var resp = eval(response);
	        switch (resp) {
	            case 10:
	                alert("Los campos marcados con (*) son obligatorios.");
	                break;
	            case 11:
	                alert("La identificaion debe ser un numero");
	                break;
	            case 12:
	                alert("Numero de identificacion ingresado, ya se encuentra registrado!");
	                break;
	            case 13:
	                alert("Correo electronico ingresado, no esta correo aceptamos de la forma 'ejemplo@gmail.com' ");
	                break;
	            case 15:
	                alert("Correo electronico ingresado, ya se encuentra registrado");
	                break;
	            case 16:
	                alert("Usuario ya se encuentra registrado.");
	                break;
	            case 17:
	                alert("Ops!!, ocurrio un error el guardar los datos.");
	                break;
	            case 20:
	            	$("#formUsuarios")[0].reset();
	            	var add = formDato.split();
	            	console.log(formDato)
	            	//$('#table-datos').dataTable().fnReloadAjax();
	                alert("Registro guardado de manera exitosa");
	                break;
	        }
	    })
	})
})