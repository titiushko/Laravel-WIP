/*
 * Definición de constantes que se usan en la interfaz
 * Modificar los valores de las constantes podría causar diferentes comportamientos en la interfaz del sistema
 */
var Constantes = new function () {
    this.PERMISO_DENEGADO = "No tienes permiso para realizar esta acción.";

    this.PRIVILEGIO_DENEGADO = function (vista) {
        return "No tienes privilegios para ver " + (vista == "" || vista == undefined ? "esta" : "<b>" + vista.toLowerCase() + "</b>") + " página.";
    };

    this.ACCESO_DENEGADO = "Por favor, inicie sesión en el sistema para acceder al contenido.";

    this.DENEGADO_ELIMINARSE = "No puedes eliminar a tu propio usuario.";

    this.NECESITA_REINICIAR_SESION = "Debes reiniciar tu sesión ahora.";

    this.MENSAJE_ELIMINAR = "No se puede recuperar después de eliminar. ¿Está seguro de continuar?";

    this.ERROR_POR_DEFECTO = function (elemento, mensaje) {
        return "Algo salió mal" + (elemento == undefined ? "" : " en " + elemento) + (mensaje == undefined ? "." : ":<br>" + mensaje) + "<br>Por favor, inténtelo de nuevo más tarde.";
    };

    this.TRUE = "TRUE";
    this.FALSE = "FALSE";
}
