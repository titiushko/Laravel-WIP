$(document).ready(function () {
    tinymce.init({
        selector: "textarea",
        inline: false,
        browser_spellcheck: true,
        menubar: false,
        statusbar: false,
        plugins: "table lists link advlist image",
        toolbar: "undo redo | bold italic underline | styleselect numlist bullist outdent indent | link | image table | popup",
        valid_elements: "*[*]",
        contextmenu: "undo redo",
        setup: function (editor) {
            var $editor_id = editor.id;
            var $field = $("[for='" + $editor_id + "']").text().replace(" *", "");
            var height = 400;

            editor.addButton("popup", {
                tooltip: "Editar texto en una ventana desplegable",
                icon: "popup",
                onclick: function () {
                    var PopPupPositionTop = $(window).scrollTop();
                    var $content = tinymce.get($editor_id).getContent();

                    editor.windowManager.open({
                        title: "Editar Texto",
                        body:
                            [
                                {
                                    type: "textbox",
                                    multiline: true,
                                    minWidth: IS_ALLOWABLE_RESOLUTION ? 1000 : 500,
                                    minHeight: IS_ALLOWABLE_RESOLUTION ? height : height - 100,
                                    name: "source",
                                    value: $content,
                                    onPostRender: function () {
                                        var style = "";
                                        var popup_is_fullscreen = false;

                                        $(".mce-container.mce-panel.mce-floatpanel.mce-window").on("click", "div[aria-label='Fullscreen']", function () {
                                            if (popup_is_fullscreen) {
                                                $(".mce-container.mce-panel.mce-floatpanel.mce-window").attr("style", style);

                                                popup_is_fullscreen = false;
                                            }
                                            else {
                                                style = $(".mce-container.mce-panel.mce-floatpanel.mce-window").attr("style");

                                                $(".mce-container.mce-panel.mce-floatpanel.mce-window").css({
                                                    "border-width": "0px",
                                                    "left": "0px",
                                                    "top": "0px",
                                                    "width": $(window).width(),
                                                    "height": "initial"
                                                });

                                                popup_is_fullscreen = true;
                                            }
                                        });
                                    }
                                }
                            ],
                        onsubmit: function () {
                            if (IS_ALLOWABLE_RESOLUTION) $("html, body").animate({ scrollTop: PopPupPositionTop }, "slow");
                            editor.setContent(tinymce.activeEditor.getContent());
                        },
                        ocancel: function () {
                            if (IS_ALLOWABLE_RESOLUTION) $("html, body").animate({ scrollTop: PopPupPositionTop }, "slow");
                        }
                    });

                    tinymce.init({
                        selector: ".mce-textbox.mce-multiline.mce-abs-layout-item.mce-first.mce-last",
                        browser_spellcheck: true,
                        menubar: false,
                        height: IS_ALLOWABLE_RESOLUTION ? height - 35 : height - 135,
                        resize: true,
                        plugins: "textcolor link preview searchreplace visualblocks code fullscreen paste code contextmenu table advlist image",
                        toolbar: "undo redo | bold italic underline | image table | cut copy paste | searchreplace | styleselect numlist bullist outdent indent | forecolor backcolor | link | visualblocks code preview fullscreen",
                        valid_elements: "*[*]",
                        contextmenu: "undo redo",
                        setup: function (popup_editor) {
                            popup_editor.on("keydown", function (e) {
                                if (e.shiftKey && e.keyCode == 9) {
                                    tinymce.activeEditor.execCommand("outdent");
                                    return false;
                                }
                                else if (e.keyCode == 9) {
                                    tinymce.activeEditor.execCommand("indent");
                                    return false;
                                }
                            });
                        }
                    });
                }
            });
        }
    });

    $("button[type='submit']").click(function () {
        $("#services").val(tinymce.get("services").getContent());
        $("#description").val(tinymce.get("description").getContent());
        $("#address").val(tinymce.get("address").getContent());
    });
});
