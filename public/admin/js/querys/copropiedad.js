$(document).ready(function(){

	var load = $('#loading');
	var btn						= $('#newuser');
	var UserSearch 				= $('#user_search');
	var UserFormSelected 	= $('#UserSelected');
	
	load.hide();

	var userform 		= $('#userform');
	userform.hide();

	var dataform;

	

	//new User
	btn.click(function(){

		  $('#modalform').modal('show');
		  clearform();
		
	});

	//Buscar usuario
	UserSearch.click(function(){

		var dato = $('#search_profiles').val();
		let option = 1;
		console.log(option);

		$.ajax({
					
			url: BASE_URL+'/getprofilejs',
			headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
			type: 'POST',
			dataType: 'json',
			data:{

				option : option,
				query: dato,
				
			},

			success:function(data){

				 SearchProfile(data);
			},

		});

	});



	//Funcion para listar usuarios en vista
	function SearchProfile(data){

		var datatable = document.getElementById('datatable');

		var table= '';

			for (var i = 0; i < data.length; i++)
				{       
                	table += ` 
		        		
		        	
		        		<tr>		        			
		        		
			        			<td>${data[i].id }</td>
			        			<td>${data[i].name }</td>
			        			<td>${data[i].nit }</td>
			        			<td>${data[i].email }</td>
			        			<td>	
			        		
				   
				       				<button type="button" onClick="agregarUsuario(${data[i].id })" class="btn-sm btn-primary btn" id="${data[i].id }"><i class="fa fa-check-square-o"></i></button>
				        		
				        		
			        			</td>
		        		</tr>
		        	
		        	`;		
				}


		// console.log(option);         
      datatable.innerHTML= table;	
			

	  	$('#modalUserSearch').modal('show');	

	}


	//USUARIO SELECCIONADO


	$("#dataForm").submit(function(event){
			load.show();
			event.preventDefault();
			dataform = $(this).serialize();
		
			$.ajax({
					
					url: BASE_URL+'/saveprofilejs',
					headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
					type: 'POST',
					dataType: 'json',
					data:{

						name: 			$("#username").val(),
						phone_1: 		$("#phone_1").val(),
						nit: 				$("#nit").val(),
						email: 			$("#email").val(),
						role: 			$("#role").val(),
					},
					success:function(data){
					
       				clearform();
       				if(data.code == 404)
       				{
       					load.hide();
       					$.each(data.errors, function(key, value){

											console.log(key+'='+value);
											toastr.error(value);
									});
       				}
       				if(data.code == 202)
       				{	
       						load.hide();
       						toastr.success(data.message);
       				}
       			
						
					},
					error: function(data){
							load.hide();
						 	$.each(data.responseJSON.errors, function(key, value){

											console.log(key+'='+value);
											toastr.error(value);
							});
						console.log(data);
					}
				});

			$('#modalform').modal('hide');

		});
		

	
	//Limpiar Formulario
	function clearform(){

		let usuario = $("#username").val('');
		let phone   = $("#phone_1").val('');
		let nit 		= $("#nit").val('');
		let email 	= $("#email").val('');
		let role 	  = $("#role").val('');

	
			
		}
});

	
	//Seleccionar usuario al formulario
	function agregarUsuario(data){

		var option = 2;
			$.ajax({
					
					url: BASE_URL+'/getprofilejs',
					headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
					type: 'POST',
					dataType: 'json',
					data:{

						option : option,
						query: 	data,
						
					},
					success:function(data){
						

						for (var i = 0; i < data.length; i++)
							{ 
       					$('#search_profiles').val(data[i].name);

       					$('#idUser').val(data[i].id);

       				}
       					
       					$('#modalUserSearch').modal('hide');	
							
						
					},
					error: function(data){
						
						console.log(data.responseText);

						alert('Error');
					}
				});
					

		}

