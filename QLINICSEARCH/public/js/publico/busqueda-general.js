var seccionAnterior = "";

$(document).ready(function () {
    if ($("#BuscarClinica").size() > 0) {
        $("#BuscarClinica").autocomplete({
            minLenght: 2,
            select: function (event, object) {
                $("#BuscarClinica").val(object.item.label);
            },
            messages: {
                noResults: "",
                results: function () { }
            },
            source: function (request, response) {
                response([{ loading: true }]);

                $.ajax({
                    url: URL_BASE + "/busqueda/clinicas",
                    data: {
                        palabra: request.term
                    },
                    type: "POST",
                    dataType: "json",
					beforeSend: function (xmlHTTPRequest) {
						xmlHTTPRequest.setRequestHeader("X-CSRF-TOKEN", $("meta[name='csrf-token']").attr("content"));
					},
                    success: function (result) {
                        var resultado = new Array({
                            seccion: "Buscar por",
                            name: $("#BuscarClinica").val(),
                            url: URL_BASE + "/busqueda/clinicas/resultado/" + $("#BuscarClinica").val(),
                            tag: ""
                        });

                        if (result.length > 0) {
                            $.map(result, function (elemento, indice) {
                                resultado.push({
                                    seccion: elemento.seccion,
                                    name: elemento.name,
                                    url: URL_BASE + (elemento.seccion == "Clínicas" ? "/clinics/" : "/types/") + elemento.id,
                                    tag: elemento.tag
                                });
                            });

                            response(resultado);
                        }
                        else {
                            response([{ noResults: true }]);
                        }
                    }
                });
            }
        }).data("ui-autocomplete")._renderItem = function (clinicas, data) {
            if (data.noResults) {
                return $("<li></li>").data("data.autocomplete", data)
                .append(
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<i class='fa fa-times-circle'></i> No hay resultados de búsqueda</span>" +
                        "</div>" +
                    "</div>")
                .appendTo(clinicas);
            }

            if (data.loading) {
                return $("<li></li>").data("data.autocomplete", data)
                .append(
                    "<div class='row'>" +
                        "<div class='col-md-12'>" +
                            "<i class='fa fa-refresh fa-spin'></i> Buscando<span class='one'>.</span><span class='two'>.</span><span class='three'>.</span>" +
                        "</div>" +
                    "</div>")
                .appendTo(clinicas);
            }
            else {
				if (seccionAnterior != data.seccion) {
					seccion = "<b>" + data.seccion + "</b>";
					seccionAnterior = data.seccion;
				}
				else {
					seccion = "";
				}
				return $("<li></li>").data("data.autocomplete", data)
				.append(
					"<a href='" + data.url + "'>" +
						"<div class='row'>" +
							"<div class='col-xs-3 col-sm-3 col-md-3'>" +
								seccion +
							"</div>" +
							"<div class='col-xs-9 col-sm-9 col-md-9'>" +
								"<div class='row'>" +
									"<div class='col-md-12'>" +
                                        WordsRelatedTerms(data.name, $("#BuscarClinica").val()) +
                                        (data.tag ? " <span class='label label-success'>" + data.tag + "</span>" : "") +
									"</div>" +
								"</div>" +
							"</div>" +
						"</div>" +
					"</a>")
				.appendTo(clinicas);
            }
        };
    }
});
