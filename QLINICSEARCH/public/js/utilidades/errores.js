/**
 * Mostrar respuesta de error de mensaje de una peticion AJAX
 */
var isModal = false;
function MostrarMensajeError(mensaje) {
    if (!isModal) alertify.closeAll();
    if (mensaje != undefined) {
        if (Array.isArray(mensaje)) {
            mensaje.forEach(function (elemento, indice) {
                console.warn(elemento);
                alertify.error(elemento);
            });
        }
        else {
            console.warn(mensaje);
            alertify.error(mensaje);
        }
    }
}

/**
 * Muestra la respuesta de éxito del mensaje de una peticion AJAX
 */
function MostrarMensajeExito(mensaje) {
    if (!isModal) alertify.closeAll();
    if (mensaje != undefined) {
        if (Array.isArray(mensaje)) {
            mensaje.forEach(function (elemento, indice) {
                alertify.success(elemento);
            });
        }
        else {
            alertify.success(mensaje);
        }
    }
}

/**
 * Mostrar excepción de mensaje de una peticion AJAX
 */
function MostrarMensajeExcepcion(excepcion, mensaje, peticion) {
    if (peticion != undefined || peticion != null) peticion = peticion.indexOf("://") == -1 ? URL_BASE + peticion : peticion; else peticion = "";
    if (!isModal) alertify.closeAll();

    var mensaje_error = Constantes.ERROR_POR_DEFECTO("al intentar " + mensaje) + "<br>";
    var excepcion_error = "";

    if (excepcion.status != undefined) {
        mensaje_error += excepcion.status + " (" + excepcion.statusText + ").<br>";
        excepcion_error = excepcion.responseText;

        if ([400, 404, 500].indexOf(excepcion.status) != -1) {
            alertify.MyModal.alert({
                title: "<i class='fa fa-times-circle text-danger'></i> Error de Petición",
                content: excepcion.responseText.toJQuery(),
                maximizable: true,
                onShow: function () {
                    $(".ajs-content > div").css({ "overflow-y": "hidden", "overflow-x": "auto" });
                }
            });
        }
    }
    else {
        excepcion_error = JSON.stringify(excepcion);
    }

    console.warn(mensaje_error);
    console.warn(excepcion_error);
    alertify.error(mensaje_error);
    QuitarSpinner();
}

/**
 * Hacer si la respuesta es un error o denegación
 */
function EsErrorODenegado(respuesta) {
    if (respuesta != undefined) {
        if (typeof respuesta.error == "string") {
            if (respuesta.error == "AutenticacionDenegada") redirect_url = URL_BASE + "login";
            else if (respuesta.error == "AccesoDenegado") redirect_url = respuesta.return_url;
            alertify.alert("<i class='fa fa-times-circle text-danger'></i> Acceso denegado", respuesta.mensaje == undefined ? "No tienes privilegios." : respuesta.mensaje, function () { location.href = redirect_url; }).set("label", "Cerrar");
        }
        else if (typeof respuesta.error == "boolean") {
            if (respuesta.error && respuesta.mensaje != undefined) MostrarMensajeError(respuesta.mensaje);
        }
    }
}
