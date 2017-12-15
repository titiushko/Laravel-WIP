var IS_ALLOWABLE_RESOLUTION = $(window).width() > 974;

/**
 * VOLVER ARRIBA DE LA PÁGINA
 */
$(document).ready(function () {
    $(".container-fluid").after(
        "<button class='btn btn-sm btn-default tooltip-message' " +
            "type='button' id='scroll-top' style='display: none;' title='Volver arriba.'>" +
            "<i class='fa fa-angle-up'></i>" +
        "</button>"
    );

    MostrarVolverArriba();
    $(window).on({
        "scroll": MostrarVolverArriba,
        "resize": MostrarVolverArriba
    });

    $("#scroll-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        return false;
    });
});

var MostrarVolverArriba = function () {
    if ($(window).scrollTop() > 100) {
        $("#scroll-top").slideDown(300, function () {
            $(this).css({
                position: "fixed",
                left: $(".container-fluid").width() - 2,
                top: $(window).height() - (IS_ALLOWABLE_RESOLUTION ? 50 : 90)
            });
        });
    }
    else {
        $("#scroll-top").slideUp(300);
    }
}
