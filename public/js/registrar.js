$(document).ready(function(){
	$('#identificacion').keyup(function () {
	  this.value = this.value.replace([0-9]); 
	});

	$('#rEstudiante').click(function(){

		var formDato = $("#formEstudiante").serialize();
		$.ajax({
	        url: 'IngresarEstudianteController',
	        type: 'post',
	        data: formDato,
	        beforeSend: function () {

	        }
	    }).done(function (response) {
	    	console.log(response)
	        var resp = eval(response);
	        switch (resp) {
	            case 10:
	                alert("Rellenar todos los campos del formulario");
	                break;
	            case 20:
	                alert("La identificacion debe ser un numero");
	                break;
	            case 30:
	                alert("Identificacion ya se encuentra registrada!");
	                break;
	            case 40:
	                alert("Usuario ya se encuentra registrado ");
	                break;
	            case 50:
	                $("#formEstudiante")[0].reset();
	                alert("Los datos se guardaron de manera exitosa \n Puede ingresar al sistema!");
	                break;
	            case 60:
	                alert("Ops!! \n Ocurrio un error al momento de guardar los datos!");
	                break;
	            case 70:
	                alert("Ops!! \n Contraseñas no cohinciden!");
	                break;           
	        }
	    })
	})
})