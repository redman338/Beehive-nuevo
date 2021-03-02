$(document).ready(function(){
	
		var current_fs, next_fs, previous_fs;		
		var opacity;
   
   
	$(".next").click(function(){

		 var formStatus = $('#form_prop_residente_1').validate().form();

		if( formStatus == true ){
				
				current_fs = $(this).parent();
			 	next_fs = $(this).parent().next();

								//Add Class Active
					$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

					//show the next fieldset
					next_fs.show();
					//hide the current fieldset with style
					current_fs.animate({opacity: 0}, {
						
						step: function(now) {
						// for making fielset appear animation
						opacity = 1 - now;

							current_fs.css({
							'display': 'none',
							'position': 'relative'
							});
							
							next_fs.css({'opacity': opacity});
					},


					duration: 600

					});

			}
	});

	$(".previous").click(function(){

   		console.log('click previous');
			
			current_fs = $(this).parent();

			console.log(current_fs);
			previous_fs = $(this).parent().prev();

			//Remove class active
			$("#progressbar2 li").eq($("fieldset").index(current_fs)).removeClass("active");

			//show the previous fieldset
			previous_fs.show();

			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
		
			step: function(now) {
					
					// for making fielset appear animation
					opacity = 1 - now;

					
					current_fs.css({

						'display': 'none',
						'position': 'relative'

					});

					previous_fs.css({'opacity': opacity});
					},

					duration: 600
			
			});

		});

 $("#finalizar").click(function(){
     
     //event.preventDefault();
    var formStatus = $('#form_prop_residente_1').validate().form();


    if( formStatus == true ){
	    $.ajax({
				
				
				url: BASE_URL+'/propietario/residente/savejs',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					residente1: 					$("#residente1").val(),
					residente_1_cc: 				$("#residente_1_cc").val(),
					residente_1_phone_1: 			$("#residente_1_phone_1").val(),
					residente_1_celular_1: 			$("#residente_1_celular_1").val(),
					email: 							$("#email").val(),
					residente2: 					$("#residente2").val(),
					residente_2_cc: 				$("#residente_2_cc").val(),
					residente_2_phone_1:			$("#residente_2_phone_1").val(),
					residente_2_celular_1:			$("#residente_2_celular_1").val(),
					vehiculo_tipo: 					$("#vehiculo_tipo").val(),
					vehiculo_marca: 				$("#vehiculo_marca").val(),
					vehiculo_modelo:				$("#vehiculo_modelo").val(),
					vehiculo_placa:					$("#vehiculo_placa").val(),
					vehiculo_color:					$("#vehiculo_color").val(),
					vehiculo_parqueadero:			$("#vehiculo_parqueadero").val(),
					colaborador_nombre:				$("#colaborador_nombre").val(),
					colaborador_direccionresidencia:$("#colaborador_direccionresidencia").val(),
					colaborador_phone_1:			$("#colaborador_phone_1").val(),
					colaborador_celular:			$("#colaborador_celular").val(),
					colaborador_c_emergency:		$("#colaborador_c_emergency").val(),
					colaborador_c_phone_2:			$("#colaborador_c_phone_2").val(),
					colaborador_c_celular:			$("#colaborador_c_celular").val(),
					mascota_tipo:					$("#mascota_tipo").val(),
					mascota_nombre:					$("#mascota_nombre").val(),
					mascota_raza:					$("#mascota_raza").val(),
					mascota_color:					$("#mascota_color").val(),
				},

				success:function(data){
				
					
					if(data.code == 404)
					{

						alert('error...');
						$.each(data.errors, function(key, value){

										console.log(key+'='+value);
										//toastr.error(value);
								});
					}
					if(data.code == 202)
					{
						
						toastr.success('Registro Creado con Exito');
					   	window.location.replace("/dashboard");
							
					}
				
					
				},
				
				error: function(data){
						
						console.log(data);
						// 	$.each(data.responseJSON.errors, function(key, value){

						// 				console.log(key+'='+value);
						// 				//toastr.error(value);
						// });
					
				}
			});
   		}
   		else{


   				return false;
   		}


	});
   	



   

		$('.radio-group .radio').click(function(){
		$(this).parent().find('.radio').removeClass('selected');
		$(this).addClass('selected');
		});


	// $('.link_propietario_residente').click(function(event){

	// 	event.preventDefault();

	// 		var boxForm = document.getElementById("boxForm");
			

	
	// 		alert('Click');
	// });
	
	

	// $('.link_residente_ext').click(function(event){

	// 	event.preventDefault();

	// 	alert('Click_residentes');

	// });

});

