$(document).ready(function () {
    $("#clinics").on("click", ".CambiarEstado", function (event) {
        event.preventDefault();
        PonerSpinner();
        $elemento = $(this);
        $.ajax({
            url: URL_BASE + "/clinics/change-state",
            data: {
                id: $elemento.data("id"),
                state: $elemento.data("state")
            },
            type: "POST",
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
                MostrarMensajeExcepcion(excepcion, "cambiar estado de clínica", "clinics/change-state");
            }
        });
    });
});
