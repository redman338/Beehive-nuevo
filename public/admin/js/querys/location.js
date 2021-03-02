$(document).ready(function(){

/*********SELECT DEPARTAMENTO
	/***********************************************/


	var id_de=0;
	

	$('#department').typeahead({
				
			hint: true,
			highlight: true,
			minLength: 1,
			
	
		source: function(query, process){
						
					$.ajax({
						url: BASE_URL+'/buscar/departamento/',
						headers : {'X-CSRF-TOKEN' : $('#token').val()},
						type: 'GET',
						dataType: 'json',
						data:{
							query:query,
						},
						success:function(data){
							
           					// console.log(data);
           					 process(data);
								
							
							}
						});


					},
					// displayText: function(item){
					// 	$('#state').item;
					// },
					afterSelect : function(data){

						//console.log(data.name);
					
						id_de = data.id;

						
						return id_de;

					}

			});



	/*********SELECT CIUDAD
	/***********************************************/

			$('#city').typeahead({
				
			hint: true,
			highlight: true,
			minLength: 1,
			
			  
		
		source: function(query, process){
						
			//alert('id_departamento :'+id_de );

					$.ajax({
						url: BASE_URL+'/buscar/ciudad',
						headers : {'X-CSRF-TOKEN' : $('#token').val()},
						type: 'GET',
						dataType: 'json',
						data:{
							query:query,
							id_de:id_de,
							
						},
						success:function(data){
								 	process(data);
									console.log(data);

									
								}
						});
					},
					// displayText: function(item){
					// 	$('#state').item;
					// },
					afterSelect : function(data){

						console.log(data.name);

					
					}

			});

});