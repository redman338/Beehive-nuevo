$(document).ready(function(){

		function getpost(){

				$.ajax({

						url: '/getposts',
						headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
						type: 'POST',
						dataType: 'json',
						data:{							
			
							},
					success:function(data){				
					
								if(data.code == 404)
								{

									//alert('error...');
									$.each(data.errors, function(key, value){

													console.log(key+'='+value);
													toastr.error(value);
											});
								}
						

									if(data.code == 202)
									{
										
											showpost(data);
									   	
									   	
											
									}
				
					
					},
				
							error: function(data){
									
									console.log(data);
										$.each(data.responseJSON.errors, function(key, value){

													console.log(key+'='+value);
													//toastr.error(value);
									});
					
							}
				});
		}

		$("#publicar").click(function(){

			
				$.ajax({

								url: '/saveposts',
								headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
								type: 'POST',
								dataType: 'json',
								data:{

										body: 					$("#message").val(),
										
					
									},

				success:function(data){
				
					
					if(data.code == 404)
					{

						//alert('error...');
						$.each(data.errors, function(key, value){

										console.log(key+'='+value);
										toastr.error(value);
								});
					}
						

						if(data.code == 202)
						{
							
							toastr.success('Registro Creado con Exito');
						   	//window.location.replace("/dashboard");
						   	console.log(data);

						   	var body = $("#message").val('');
						   	window.location.replace("/micomunidad");

								
						}
				
					
				},
				
				error: function(data){
						
						console.log(data);
							$.each(data.responseJSON.errors, function(key, value){

										console.log(key+'='+value);
										//toastr.error(value);
						});
					
				}
			});
			//AJAX


		});
		//CLICK

		function showpost(data){

					console.log(data);


		}

		$('#actualizar_post').click(function(){

						id: $("#editpost_id").val(),

	
							$.ajax({

								url: '/updatepost',
								headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
								type: 'POST',
								dataType: 'json',
								data:{

										id: $("#editpost_id").val(),
										body: $("#edit_message").val(),
										
					
									},
								success:function(data){
				
					
										if(data.code == 404)
										{

											//alert('error...');
											$.each(data.errors, function(key, value){

															console.log(key+'='+value);
															toastr.error(value);
													});
										}
						

									if(data.code == 202)
									{
											
											$("#editpost_modal").modal('hide');										
									   	toastr.success(data.message);
											
									   	console.log(data);
									   	// 	var delayInMilliseconds = 1000; //1 second

													// setTimeout(function() {
													  
													  	
													//   	window.location.replace("/micomunidad");

													// }, delayInMilliseconds);
									   
									   	window.location.replace("/micomunidad");

											
									}
							
								
							},

					});


		});

});
	
		function deletepost(post_id){

						

				
							event.preventDefault();

								$.ajax({

								url: '/deletepost',
								headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
								type: 'POST',
								dataType: 'json',
								data:{

										id: post_id,
										
					
									},

				success:function(data){
				
					
					if(data.code == 404)
					{

						//alert('error...');
						$.each(data.errors, function(key, value){

										console.log(key+'='+value);
										toastr.error(value);
								});
					}
						

						if(data.code == 202)
						{
							
							
						   	toastr.success('Eliminado');
						   //	console.log(data);
						   		var delayInMilliseconds = 2000; //1 second

										setTimeout(function() {
										  
										  	
										  	window.location.replace("/micomunidad");

										}, delayInMilliseconds);
						   
						   	

								
						}
				
					
				},
				
				error: function(data){
						
						console.log(data);
							$.each(data.responseJSON.errors, function(key, value){

										console.log(key+'='+value);
										//toastr.error(value);
						});
					
				}
			});
			//AJAX
				
		}


		function editpost(id)
		{
			$(document).ready(function(){
					
						$.ajax({

								url: '/searchpost',
								headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
								type: 'POST',
								dataType: 'json',
								data:{

										id: id,
										
					
									},

							success:function(data){
								
											if(data.code == 404)
											{

												//alert('error...');
												$.each(data.errors, function(key, value){

																console.log(key+'='+value);
																toastr.error(value);
														});
											}
												

												if(data.code == 202)
												{
													console.log(data.post.body);
													
													$('#edit_message').val(data.post.body);
													$('#editpost_id').val(data.post.id);

												  $("#editpost_modal").modal('show');
												   	

														
												}

									}

							});

				});	
		}
	
