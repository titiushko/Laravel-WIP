function Contactanos() {
    $(".EnviarComentario").click(function (event) {
        event.preventDefault();
        alertify.MyModal.alert({
            url: URL_BASE + "/contactanos",
            title: "<i class='fa fa-envelope'></i> Contáctanos",
            hideFooter: true,
            onShow: function () {
                $form = $("#ContactanosForm");
                $form.find("button[type='submit']").click(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: $form.attr("action"),
                        data: new function () {
                            this.nombre = $form.find("#nombre").val(),
                            this.correo = $form.find("#correo").val(),
                            this.mensaje = $form.find("#mensaje").val()
                        },
                        type: "POST",
                        dataType: "json",
                        beforeSend: function (xmlHTTPRequest) {
                            xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
                        },
                        success: function (respuesta) {
                            debugger;
                            $("div.alert.alert-danger").addClass("hide").find("ul").empty();
                            if (respuesta.error) {
                                if (respuesta.mensaje != undefined) alertify.error(respuesta.mensaje);
                                if (respuesta.errores != undefined && respuesta.errores.customMessages != undefined) {
                                    // Errores del campo nombre
                                    if (respuesta.errores.customMessages["nombre.min"] != "") $("#nombre_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["nombre.min"] + "</li>");
                                    if (respuesta.errores.customMessages["nombre.max"] != "") $("#nombre_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["nombre.max"] + "</li>");
                                    if (respuesta.errores.customMessages["nombre.required"] != "") $("#nombre_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["nombre.required"] + "</li>");
                                    if (respuesta.errores.customMessages["nombre.regex"] != "") $("#nombre_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["nombre.regex"] + "</li>");
                                    // Errores del campo correo
                                    if (respuesta.errores.customMessages["correo.min"] != "") $("#correo_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["correo.min"] + "</li>");
                                    if (respuesta.errores.customMessages["correo.max"] != "") $("#correo_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["correo.max"] + "</li>");
                                    if (respuesta.errores.customMessages["correo.required"] != "") $("#correo_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["correo.required"] + "</li>");
                                    if (respuesta.errores.customMessages["correo.email"] != "") $("#correo_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["correo.email"] + "</li>");
                                    // Errores del campo mensaje
                                    if (respuesta.errores.customMessages["mensaje.min"] != "") $("#mensaje_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["mensaje.min"] + "</li>");
                                    if (respuesta.errores.customMessages["mensaje.required"] != "") $("#mensaje_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["mensaje.required"] + "</li>");
                                }
                            }
                            else {
                                alertify.closeAll();
                                alertify.success(respuesta.mensaje);
                            }
                        },
                        error: function (excepcion) {
                            debugger;
                            MostrarMensajeExcepcion(excepcion, "enviar comentario", $form.attr("contactanos"));
                        }
                    });
                });
            }
        });
    });
}
