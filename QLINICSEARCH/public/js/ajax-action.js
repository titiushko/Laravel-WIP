$(document).ready(function () {
    $(".table-responsive").on("click", ".AjaxAction", function (event) {
        event.preventDefault();
        PonerSpinner();
        $elemento = $(this);
        alertify.confirm(
            $elemento.data("message") ? $elemento.data("message") : Constantes.MENSAJE_ELIMINAR,
            function () {
                $.ajax({
                    url: $elemento.data("url"),
                    type: $elemento.data("type") ? $elemento.data("type") : "GET",
                    dataType: "json",
                    beforeSend: function (xmlHTTPRequest) {
                        xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
                    },
                    success: function (respuesta) {
                        QuitarSpinner();
                        EsErrorODenegado(respuesta);
                        if (!respuesta.error) {
                            alertify.success(respuesta.mensaje);
                            setTimeout(function () { location.reload(true); }, 1000);
                        }
                    },
                    error: function (excepcion) {
                        MostrarMensajeExcepcion(excepcion, "realizar la petición", $elemento.data("url"));
                    }
                });
            },
            null
        );
    });
});
