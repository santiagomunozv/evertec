"use strict";
let errorClass = "is-invalid";

$(function () {
    const id = document.getElementById('id').value;
    if (id) {
        $('.form-control').attr('readonly', true);
        $('.form-control').attr('disabled', true);
        $(".chosen-select").attr('disabled', true).trigger("chosen:updated");
    }
})

function searchPriceProduct(productId = 0) {
    let price = 0;
    if (productId) {
        let route = 'searchpriceproduct/' + productId;
        $.get(route, function (resp) {
            price = resp.price;
            document.getElementById("price").value = price;
        }, "json").fail(function (resp) {
            resp.responseJSON.message
            modal.mostrarErrores([], route, resp);
        });
    }
    document.getElementById("price").value = price;
}

function comprar() {
    modal.cargando();
    let mensajes = validarForm();
    if (mensajes && mensajes.length) {
        modal.mostrarErrores(mensajes);
    } else {
        let formularioId = "#form-pedido";
        let route = $(formularioId).attr("action");
        let data = $(formularioId).serialize();
        $.post(route, data, function (resp) {
            modal.establecerAccionCerrar(function () {
                location.href = "/transacciones/pedido/" + resp.id + "/edit";
            });
            modal.mostrarModal("Información", "<div class=\"alert alert-success\">El pedido ha sido cancelado correctamente</div>");
        }, "json").fail(function (resp) {
            $.each(resp.responseJSON.errors, function (index, value) {
                mensajes.push(value);
                $("#" + index).addClass(errorClass);
            });
            modal.mostrarErrores(mensajes);
        });
    }

    function validarForm() {
        let mensajes = [];

        var product_id = obtenerCampos("product_id");
        if (product_id.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Producto"));
        }

        var document_type = obtenerCampos("document_type");
        if (document_type.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Tipo de documento"));
        }

        var document_number = obtenerCampos("document_number");
        if (document_number.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Nombre"));
        }

        var customer_name = obtenerCampos("customer_name");
        if (customer_name.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Nombre"));
        }

        var customer_last_name = obtenerCampos("customer_last_name");
        if (customer_last_name.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Apellido"));
        }

        var customer_email = obtenerCampos("customer_email");
        if (customer_email.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Correo"));
        }

        var customer_mobile = obtenerCampos("customer_mobile");
        if (customer_mobile.hasClass(errorClass)) {
            mensajes.push(marcarNegrita("Teléfono"));
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

function cancelOrder() {
    const id = document.getElementById('id').value;
    let route = '/transacciones/pedido/' + id
    let token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route,
        type: 'DELETE',
        headers: { 'X-CSRF-TOKEN': token },
        contentType: 'application/json',
        dataType: 'text',
        success: function (result) {
            modal.establecerAccionCerrar(function () {
                location.href = "/transacciones/pedido";
            });
            modal.mostrarModal("Información", "<div class=\"alert alert-info\">Los datos han sido eliminnados correctamente</div>");
        },
        error: function (resp) {
            resp.responseJSON.message
            modal.mostrarErrores([], route, resp);
        }
    });
}
