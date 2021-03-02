$(document).ready(function($){


	var getbutton = $('#getdesprendible');
	var token = $('#token');

	$("#getData").submit(function(event){

		getData = $(this).serialize();
		console.log( getData);

		event.preventDefault();
		$.ajax({

				url: BASE_URL+'/buscar/desprendibles',
				headers : { 'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					numero_doc: 	$("#numero_doc").val(),
					inmueble_id: 	$("#inmueble_id").val(),
					year_id: 		$("#year_id").val(),
					month_id: 		$("#month_id").val(),
				
				},
								
			success:function(data){
					
				showmodaldata(data);
				
							
				
				},
			error: function(data){
						
						console.log(data);

						// alert('Error');
					}

		})

	});


	function showmodaldata(data){

		var datatable = document.getElementById('datatable');

		var table= '';


			for (var i = 0; i < data.length; i++)
				{       
                	table += ` 
		        		
		        	
		        		<tr>
		        			
							
								<td>${data[i].numero_doc }</td>
								<td>${data[i].inmueble }</td>
								<td>${data[i].total }</td>
								<td>${data[i].status }</td>
			        			<td><a href="obligaciones/${data[i].id } "> <i class="fa fa-stop-circle-o"</i></a></td>
			        				
		        		</tr>
		        	
		        	`;		
				}		
					// console.log(option);         
              	 datatable.innerHTML= table;	
			

	  	$('#modaldata').modal('show');


	}
});