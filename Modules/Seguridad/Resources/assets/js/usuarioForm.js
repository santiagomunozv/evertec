"use strict";
let errorClass = "is-invalid";

function grabar(){
    modal.cargando();
    let mensajes = validarForm();
    if( mensajes && mensajes.length){
        modal.mostrarErrores(mensajes);
    }else{
        let formularioId = "#form-usuario";
        let route = $(formularioId).attr("action");
        let data = $(formularioId).serialize();
        $.post(route,data, function( resp ){
            modal.establecerAccionCerrar(function(){
                location.href = "/seguridad/usuario";
            });
            modal.mostrarModal("Información" , "<div class=\"alert alert-success\">Los datos han sido guardados correctamente</div>");
        },"json").fail( function(resp){
            $.each(resp.responseJSON.errors, function(index, value) {
                mensajes.push( value );
                $("#"+index).addClass(errorClass);
            });
            modal.mostrarErrores(mensajes);
        });
    }

    function validarForm() {
        let mensajes = [];

        var login = obtenerCampos("login");
        if (login.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Nombre de usuario"));
        }

        var password = obtenerCampos("password");
        if (password.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Contraseña"));
        }

        var role_id = obtenerCampos("role_id");
        if (role_id.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Rol"));
        }

        return mensajes;
    }

    function obtenerCampos(imput) {
        let campo = $("#" + imput);
        let campo_AE = campo.val();

        return !campo_AE
            ? campo.addClass(errorClass)
            : campo.removeClass(errorClass);
    }
}
