$(document).ready(function(){
	
	var busquedaInsumo = $("#searchInsumo");

	busquedaInsumo.autocomplete({

		minLength: 2,
		select: function(event, ui){
			busquedaInsumo.val(ui.item.label);
		},
		source: function(request, response){

			$.ajax({

				url: basePath = "insumos/searchJson",
				data:{

					term: request.term
				},
				dataType: "json",
				success: function(data){
					response($.map(data, function(el, index){
						return {

							value: el.Insumo.nombre,
							nombre: el.Insumo.nombre
						};
					} ));
				}
			});


		}
	}).data("ui-autocomplete")._renderItem = function(ul, item){
		return $("<li></li>")
		.data("item.autocomplete",item)
		.append("<a>"+item.nombre+"</a>")
		.appendTo(ul)
	}
});