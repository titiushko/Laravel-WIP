/**
 * OVERRIDE DEFAULTS ALERTIFY
 */

// Theme
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";

// Confirm modal
alertify.defaults.glossary.title = "<i class='fa fa-info-circle text-info'></i> Por favor seleccione una opción";
alertify.defaults.glossary.ok = "Sí";
alertify.defaults.glossary.cancel = "No";

alertify.defaults.transition = "slide";
alertify.defaults.maximizable = false;
alertify.defaults.closable = true;
alertify.defaults.closableByDimmer = true;

// Custom alertify alert and confirm

var ALLOW_DEBUGGER_ALERTIFY = false;

alertify.MyModal = {
    alert: function (config) {
        if (ALLOW_DEBUGGER_ALERTIFY) debugger;

        if (config.onShow == undefined) config.onShow = function () { };
        if (config.onClose == undefined) config.onClose = null;
        if (config.onOk == undefined) config.onOk = null;
        if (config.url == undefined) config.url = null;
        if (config.content == undefined) config.content = null;
        if (config.parameters == undefined) config.parameters = null;
        if (config.maximizable == undefined) config.maximizable = false;
        if (config.startMaximized == undefined) config.startMaximized = false;
        if (config.label == undefined) config.label = "Close";
        if (config.closeAll == undefined) config.closeAll = true;
        if (config.closable == undefined) config.closable = true;
        if (config.hideFooter == undefined) config.hideFooter = true;

        if (config.closeAll) alertify.closeAll();

        alertify.alert().set({
            maximizable: config.maximizable,
            startMaximized: config.startMaximized,
            label: config.label,
            closable: config.closable,
            onshow: function () {
                if (ALLOW_DEBUGGER_ALERTIFY) debugger;

                $(this.elements.header).html(config.title);

                if (config.url != null && config.content == null) {
                    if (config.parameters != null) {
                        $(this.elements.content).load(config.url, config.parameters, config.onShow);
                    }
                    else {
                        $(this.elements.content).load(config.url, config.onShow);
                    }
                }
                else if (config.url == null && config.content != null) {
                    $(this.elements.content).html(config.content);
                    config.onShow();
                }
                else {
                    $(this.elements.content).append("<div class='row'><div class='col-md-12 text-center'><span class='alert alert-danger'>The content source for <i>alertify.MyModal.alert</i> has not been defined.</span></div></div>");
                }

                if (config.hideFooter) $(this.elements.footer).hide();
            },
            onclose: function () {
                if (ALLOW_DEBUGGER_ALERTIFY) debugger;

                if (config.onClose != null && typeof config.onClose == "function") config.onClose();
                if (config.hideFooter) $(this.elements.footer).show();

                // Restoring default settings
                $(this.elements.content).empty();
                alertify.alert("<i class='fa fa-exclamation-triangle text-warning'></i> Alert", "", null)
                .set({
                    label: "Ok",
                    maximizable: false,
                    startMaximized: false,
                    onshow: function () {
                        if (ALLOW_DEBUGGER_ALERTIFY) debugger;
                        if (config.hideFooter) $(this.elements.footer).show();
                    }
                });
            }
        });

        alertify.alert(
            "<span id='MyModalAlertTitle'></span>",
            "<div id='MyModalAlertContent'></div>",
            config.onOk
        );
    },
    confirm: function (config) {
        if (ALLOW_DEBUGGER_ALERTIFY) debugger;

        if (config.onShow == undefined) config.onShow = function () { };
        if (config.onClose == undefined) config.onClose = null;
        if (config.onOk == undefined) config.onOk = null;
        if (config.onCancel == undefined) config.onCancel = null;
        if (config.url == undefined) config.url = null;
        if (config.content == undefined) config.content = null;
        if (config.parameters == undefined) config.parameters = null;
        if (config.maximizable == undefined) config.maximizable = false;
        if (config.startMaximized == undefined) config.startMaximized = false;
        if (config.hidePrimaryButton == undefined) config.hidePrimaryButton = false;
        if (config.closeAll == undefined) config.closeAll = true;
        if (config.closable == undefined) config.closable = true;
        if (config.hideFooter == undefined) config.hideFooter = false;

        if (config.closeAll) alertify.closeAll();

        alertify.confirm().set({
            labels: config.labels,
            maximizable: config.maximizable,
            startMaximized: config.startMaximized,
            closable: config.closable,
            onshow: function () {
                if (ALLOW_DEBUGGER_ALERTIFY) debugger;

                $(this.elements.header).html(config.title);

                if (config.hidePrimaryButton) {
                    $(".ajs-button.btn.btn-primary").addClass("hide");
                    $(".ajs-button.btn.btn-danger").removeClass("btn-danger").addClass("btn-primary");
                }

                if (config.url != null && config.content == null) {
                    if (config.parameters != null) {
                        $(this.elements.content).load(config.url, config.parameters, config.onShow);
                    }
                    else {
                        $(this.elements.content).load(config.url, config.onShow);
                    }
                }
                else if (config.url == null && config.content != null) {
                    $(this.elements.content).html(config.content);
                    config.onShow();
                }
                else {
                    $(this.elements.content).append("<div class='row'><div class='col-md-12 text-center'><span class='alert alert-danger'>The content source for <i>alertify.MyModal.confirm</i> has not been defined.</span></div></div>");
                }

                if (config.hideFooter) $(this.elements.footer).hide();
            },
            onclose: function () {
                if (ALLOW_DEBUGGER_ALERTIFY) debugger;

                if (config.hidePrimaryButton) {
                    $(".ajs-button.btn.btn-primary:not(.hide)").removeClass("btn-primary").addClass("btn-danger");
                    $(".ajs-button.btn.btn-primary").removeClass("hide");
                    config.hidePrimaryButton = false;
                }

                if (config.onClose != null && typeof config.onClose == "function") config.onClose();
                if (config.hideFooter) $(this.elements.footer).show();

                // Restoring default settings
                $(this.elements.content).empty();
                alertify.confirm(alertify.defaults.glossary.title, "", null, null)
                .set({
                    labels: {
                        ok: alertify.defaults.glossary.ok,
                        cancel: alertify.defaults.glossary.cancel
                    },
                    maximizable: false,
                    startMaximized: false,
                    onshow: function () {
                        if (ALLOW_DEBUGGER_ALERTIFY) debugger;
                        if (config.hideFooter) $(this.elements.footer).show();
                    }
                });
            }
        });

        alertify.confirm(
            "<span id='MyModalConfirmTitle'></span>",
            "<div id='MyModalConfirmContent'></div>",
            config.onOk,
            config.onCancel
        );
    }
};