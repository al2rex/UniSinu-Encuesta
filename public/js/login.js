$(document).ready(function(){
	//alert("documento listo");
	$(':input').live('focus',function(){
        $(this).attr('autocomplete', 'off');
    });

})

function ingresar()
{
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#clave").val());
    
    if(usuario.length <= 0)
    {
        alert("Ingresa un usuario para continuar");
        $("#usuario").focus();
        return false;
    }

    if(password.length <= 0)
    {
        alert("Ingresa una contraseña para continuar");
        return false;
    }

    $.ajax({
        url: 'LoginIngresarController',
        type: 'post',
        data: 'usuario='+usuario+'&pass='+password+'&boton=ingresar',
        beforeSend: function () {
            
        }
    }).done(function (response) {
        console.log(response)
        var resp = eval(response);
        switch (resp) {
            case 404:
                $("#usuario").val("");
                $("#pass").val("");
                $("#usuario").focus();
                alert('Las credenciales ingresadas son incorrectas');
                break;
            case 201:
                location.href = 'Dashboard-Administrador';
                break;
            case 202:
                location.href = 'Dashboard-Humano';
                break;
            case 203:
                location.href = 'Dashboard-Deporte';
                break;
            case 204:
                location.href = 'Dashboard-Cultura';
                break;
            case 205:
                location.href = 'Dashboard-Institucional';
                break;
            case 206:
                location.href = 'Dashboard-Salud';
                break;
            case 207:
                location.href = 'Dashboard-Estudiante';
                break;
            case 208:
                location.href = 'Dashboard-Auxiliar';
                break;
        }
    })
}

