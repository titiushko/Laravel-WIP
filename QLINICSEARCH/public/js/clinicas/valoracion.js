$(document).ready(function () {
    $("#valoracion input[type='number']").rating({ displayOnly: true });
    $("#valoracion .rating-container").append(
        "<div class='caption'>" +
            "<span class='text-default'>" +
                "<span class='rating-totally'>0</span> <i class='fa fa-user'></i>" +
                "&nbsp;<a class='cursor-pointer votar'>Votar</a>" +
            "</span>" +
        "</div>"
    );
    $("#valorar input[type='number']").rating({
        starCaptions: { 1: "Muy Malo", 2: "Malo", 3: "Bueno", 4: "Excelente", 5: "Muy Excelente" },
        starCaptionClasses: { 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success" },
        clearCaption: "",
        showClear: false
    }).on({
        "rating.change": function (event, value, caption) {
            GuardarValoracion(value);
        }
    });
    $("#valoracion").on("click", ".votar", function (event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: $("#valorar").offset().top - 50 }, "slow");
    });
    ObtenerValoraciones();
});

function ObtenerValoraciones() {
    $("#fade").show();
    $.ajax({
        type: "POST",
        url: URL_BASE + "/valuetions/get",
        data: { id: $("#id").val() },
        dataType: "json",
        beforeSend: function (xmlHTTPRequest) {
            xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
        },
        success: function (respuesta) {
            EsErrorODenegado(respuesta);
            if (!respuesta.error) {
                EstablecerValoracion(respuesta.valuetions);
                QuitarSpinner();
            }
        },
        error: function (excepcion) {
            MostrarMensajeExcepcion(excepcion, "obtener valoraciones", "valuetions/get");
        }
    });
}

function EstablecerValoracion(valuetions) {
    $("#valoracion input[type='number']").rating("update", valuetions.average);
    $("#valoracion .rating-container").find(".rating-totally").text(valuetions.totally);
    $("#valorar input[type='number']").rating("clear");
}

function GuardarValoracion(value) {
    $("#fade").show();
    $.ajax({
        type: "POST",
        url: URL_BASE + "/valuetions/save",
        data: new function () {
            this.clinic_id = $("#id").val();
            this.assessment = value;
        },
        dataType: "json",
        beforeSend: function (xmlHTTPRequest) {
            xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
        },
        success: function (respuesta) {
            EsErrorODenegado(respuesta);
            if (!respuesta.error) {
                $("html, body").animate({ scrollTop: $("#valoracion").offset().top - 50 }, "slow");
                EstablecerValoracion(respuesta.valuetions);
                QuitarSpinner();
                alertify.success("Gracias por tú opinión!");
            }
        },
        error: function (excepcion) {
            MostrarMensajeExcepcion(excepcion, "guardar valoración", "valuetions/save");
        }
    });
}
