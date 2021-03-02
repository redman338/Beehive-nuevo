$(document).ready(function(){
	
		var current_fs, next_fs, previous_fs;		
		var opacity;
   
   
	$(".next").click(function(){


		 var formStatus = $('#arrendatario').validate().form();

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
    var formStatus = $('#arrendatario').validate().form();


    if( formStatus == true ){
	    $.ajax({
				
				
				url: BASE_URL+'/propietario/residente/saverarrendatariojs',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					residente1: 					$("#residente1").val(),
					residente_1_cc: 				$("#residente_1_cc").val(),
					residente_1_phone_1: 			$("#residente_1_phone_1").val(),
					residente_1_celular_1: 			$("#residente_1_celular_1").val(),
					email: 							$("#email").val(),
					residente_2: 					$("#residente_2").val(),
					residente_2_cc: 				$("#residente_2_cc").val(),
					residente_2_phone_1:			$("#residente_2_phone_1").val(),
					residente_2_celular_1:			$("#residente_2_celular_1").val(),
					
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
					   	
					   	console.log(data);

					   	window.location.replace(BASE_URL+"/dashboard");
							
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

