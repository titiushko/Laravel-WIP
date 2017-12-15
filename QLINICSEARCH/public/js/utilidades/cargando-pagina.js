function PonerSpinner() {
    $("body").addClass("modal-open");
    $("#fade").show();
}

function QuitarSpinner() {
    setTimeout(function () {
        $("body").removeClass("modal-open");
        $("#fade").hide();
    }, 500);
}

$(".body-content").prepend(
    "<div id='fade'>" +
        "<div class='modal fade-loading-page'>" +
            "<div class='content'>" +
                "<div class='sk-folding-cube'>" +
                  "<div class='sk-cube1 sk-cube'></div>" +
                  "<div class='sk-cube2 sk-cube'></div>" +
                  "<div class='sk-cube4 sk-cube'></div>" +
                  "<div class='sk-cube3 sk-cube'></div>" +
                "</div>" +
                "<h5 class='loading-text'><strong>Cargando <span class='one'>.</span><span class='two'>.</span><span class='three'>.</span></strong></h5>" +
            "</div>" +
        "</div>" +
    "</div>"
);

$(window).bind("beforeunload", function (e) { PonerSpinner(); }).load(function () { QuitarSpinner(); });
$(document).ready(function () {
    $(this).ajaxStart(function () { PonerSpinner(); }).ajaxComplete(function (event, jqXHR, data) { QuitarSpinner(); });
    if (typeof afterAjaxInit === "function") { afterAjaxInit(); }
});
