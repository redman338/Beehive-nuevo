$(document).ready(function(){

	var load = $('#loading');
	
	var UserSearch 				= $('#user_search');
	var UserFormSelected 		= $('#UserSelected');
	var optionsGroup			= $('#optionsGroup');
	var btnCopropiedadSearch	= $('#btnCopropiedadSearch');
	var boxGenerarConsulta		= $('#boxGenerarConsulta');
	var btnGenerarConsulta   	= $('#btnGenerarConsulta');
	var boxSearchCopropiedad    = $('#boxSearchCopropiedad');
	var boxlistcopopropiedades 	= $('#boxlistcopopropiedades');
	var btndeletegroup			= $('#btndeletegroup');
	
	
	load.hide();
	optionsGroup.hide();
	boxSearchCopropiedad.hide();
	boxlistcopopropiedades.hide();

	UserSearch.click(function(){

		var dato = $('#search_profiles').val();
		let option = 1;
		

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
	
	
			        
		  datatable.innerHTML= table;	
				
	
			  $('#modalUserSearch').modal('show');	
	
		}

	//Funcion Listar Copropiedades
	btnCopropiedadSearch.click(function(){
		load.show();
		var dato = $('#search_copropiedades').val();
		var option = 1;

		$.ajax({
						
				url: BASE_URL+'/getcopropiedadesjs',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{
	
					query: dato,
					option: option,
					
				},
	
				success:function(data){
					load.hide();
					SearchCopropiedads(data);
				},
	
			});
	});

	function SearchCopropiedads(data)
	{	
		
		var datatable = document.getElementById('Copropiedadtable');
	
		var table= '';

			for (var i = 0; i < data.length; i++)
				{       
					table += ` 
						
					
						<tr>		        			
						
								<td>${data[i].id }</td>
								<td>${data[i].name }</td>
								<td>${data[i].city }</td>
								<td>${data[i].address }</td>
								<td>	
							
				   
									<button type="button" onClick="agregarCopropiedad(${data[i].id })" class="btn-sm btn-primary btn" id="${data[i].id }"><i class="fa fa-check-square-o"></i></button>
								
								
								</td>
						</tr>
					
					`;		
				}


		     
	  datatable.innerHTML= table;	
			

		  $('#modalCopropiedadSearch').modal('show');	

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

											//console.log(key+'='+value);
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

											//console.log(key+'='+value);
											toastr.error(value);
							});
						
					}
				});

			$('#modalform').modal('hide');

		});


		//Generar Consulta

		btnGenerarConsulta.click(function(){
			
			let id_User = $('#idUser').val();

			if(id_User != '')
			{	
				load.show();
				boxGenerarConsulta.hide();

				$.ajax({
                
					url: BASE_URL+'/getcopropiedadxusersjs',
					headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
					type: 'POST',
					dataType: 'json',
					data:{
	
						
						query: 	id_User,
						
					},
					success:function(data){
						
						optionsGroup.show();
						boxSearchCopropiedad.show();
						load.hide();
						loadcopropiedades(data);
							
					}
				});
				
			}
			else{

				toastr.error('El Campo Usuario es requerido');
			}
			

			
		});


		btndeletegroup.click(function (){

			var arrayCheck = [];
			var check
			var user_id

			
			$("input:checkbox:checked").each(function() {
				check = $(this).val();
				arrayCheck.push(check);
		   });

		   user_id = $('#idUser').val();
		
			$.ajax({
					
				url: BASE_URL+'/deletecopropiedadxusersjs',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					
					user_id: user_id,
					cops_id: arrayCheck
					
				},
				success:function(data){
					
					if(data.code == 200)
					{
						toastr.success(data.message);

						setTimeout(function(){
							window.location.replace(BASE_URL+'/copropiedadxusers');

						},2000); 
						
					}
					

						
				}
			});
				  
			
				

		});

		function loadcopropiedades(data)
		{	

			if(data == '')
			{
				toastr.info('El Usuario no tiene ningun grupo asociado');
			}
			

			else{

				boxlistcopopropiedades.show();
				
				var box = document.getElementById('boxlist');
				box.innerHTML = '';
				var text = "";


				for (var i = 0; i < data.length; i++) {
					
					text +=

					`
					<form id="dataResponse">
						<div class="form-group row">
							<label class="col-md-3 col-sm-12 col-form-label">Copropiedad :</label>
								<div class="col-md-4 col-lx-4 col-sm-12" > 
									<input class="form-control" value="${data[i].cop_name }">
								</div>
								<div class ="col-md-2">
								
									<div class ="border-checkbox-section">
										<div class="border-checkbox-group border-checkbox-group-danger">
											<input class="border-checkbox check" type="checkbox" value="${data[i].cop_id }" id="checkbox+${data[i].id }">
											<label class="border-checkbox-label" for="checkbox+${data[i].id }"> Eliminar</label>
										</div>
									</div>
							
								</div>
						</div>
					</form>
					
					`;
				
					
				}
			
				box.innerHTML= text;
			}
		
		}
		
});

	
