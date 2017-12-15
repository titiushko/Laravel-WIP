$("#curso").change(function(event){

	//Ruta a la cual se quiere ir
	//alert('modulos/'+event.target.value);
	

	$.get('modulos/'+event.target.value,function(response,state){
		//console.log(response);
		$("#modulo").empty();
		$("#modulo").attr("placeholder","Seleccione un Modulo");
		//Agrega las opciones al select modulo
		for(i=0; i<response.length; i++){
			$("#modulo").append("<option value='"+response[i].id+"'> "+response[i].nombre_modulo+"</option>");
		}
	});
		
});

$("#curso_edit").change(function(event){

	//Ruta a la cual se quiere ir
	//alert('modulos/'+event.target.value);
	$.get('http://localhost/CENIUES/public/modulos/'+event.target.value,function(response,state){
		//console.log(response);
		$("#modulo_edit").empty();
		$("#modulo_edit").attr("placeholder","Seleccione un Modulo");
		//Agrega las opciones al select modulo
		for(i=0; i<response.length; i++){
			$("#modulo_edit").append("<option value='"+response[i].id+"'> "+response[i].nombre_modulo+"</option>");
		}
	});
		
});

