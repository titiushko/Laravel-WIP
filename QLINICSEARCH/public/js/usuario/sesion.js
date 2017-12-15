function CambiarPassword() {
    $("#CambiarPassword").click(function (event) {
        event.preventDefault();
        alertify.MyModal.alert({
            url: URL_BASE + "/password",
            title: "<i class='fa fa-lock'></i> Cambiar Contraseña",
            hideFooter: true,
            onShow: function () {
                $form = $("#UpdatePasswordForm");
                $form.find("button[type='submit']").click(function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: $form.attr("action"),
                        data: new function () {
                            this.mypassword = $form.find("#mypassword").val(),
                            this.password = $form.find("#password").val(),
                            this.password_confirmation = $form.find("#password_confirmation").val()
                        },
                        type: "POST",
                        dataType: "json",
                        beforeSend: function (xmlHTTPRequest) {
                            xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
                        },
                        success: function (respuesta) {
                            $("div.alert.alert-danger").addClass("hide").find("ul").empty();
                            if (respuesta.error) {
                                if (respuesta.mensaje != undefined) alertify.error(respuesta.mensaje);
                                if (respuesta.errores != undefined && respuesta.errores.customMessages != undefined) {
                                    if (respuesta.errores.customMessages["mypassword.required"] != "") $("#mypassword_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["mypassword.required"] + "</li>");
                                    if (respuesta.errores.customMessages["password.required"] != "") $("#password_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["password.required"] + "</li>");
                                    if (respuesta.errores.customMessages["password.min"] != "") $("#password_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["password.min"] + "</li>");
                                    if (respuesta.errores.customMessages["password.max"] != "") $("#password_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["password.max"] + "</li>");
                                    if (respuesta.errores.customMessages["password.confirmed"] != "") $("#password_confirmation_error").removeClass("hide").find("ul").append("<li>" + respuesta.errores.customMessages["password.confirmed"] + "</li>");
                                }
                            }
                            else {
                                alertify.closeAll();
                                alertify.success(respuesta.mensaje);
                                alertify.alert(
                                    "<i class='fa fa-info-circle text-info'></i> Contraseña Cambiada",
                                    Constantes.NECESITA_REINICIAR_SESION,
                                    function () {
                                        $("#CerrarSesion").click();
                                    }
                                ).set("label", "Aceptar");
                            }
                        },
                        error: function (excepcion) {
                            MostrarMensajeExcepcion(excepcion, "cambiar contraseña", $form.attr("action"));
                        }
                    });
                });
            }
        });
    });
}

function CerrarSesion() {
    $("#CerrarSesion").click(function (event) {
        event.preventDefault();
        PonerSpinner();
        $.ajax({
            url: URL_BASE + "/logout",
            type: "POST",
            dataType: "html",
            beforeSend: function (xmlHTTPRequest) {
                xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
            },
            success: function (respuesta) {
                location.href = URL_BASE;
            },
            error: function (excepcion) {
                MostrarMensajeExcepcion(excepcion, "cerrar sesión", "logout");
            }
        });
    });
}