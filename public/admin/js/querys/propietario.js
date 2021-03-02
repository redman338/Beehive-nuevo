$(document).ready(function(){
	
		var current_fs, next_fs, previous_fs;		
		var opacity;
   
   
	$(".next").click(function(){

		 var formStatus = $('#msform').validate().form();

		if( formStatus == true ){
				
				current_fs = $(this).parent();
			 	next_fs = $(this).parent().next();

								//Add Class Active
					$("#progressbar2 li").eq($("fieldset").index(next_fs)).addClass("active");

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
    var formStatus = $('#msform').validate().form();


    if( formStatus == true ){
	    $.ajax({
				
				
				url: BASE_URL+'/save/propietario',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					tipo_identificacion: 	$("#tipo_identificacion").val(),
					nit: 									$("#nit").val(),
					name: 								$("#name").val(),
					phone_1: 							$("#phone_1").val(),
					phone_2: 							$("#phone_2").val(),
					email: 								$("#email").val(),
					politica_datos: 			$("#politica_datos").val(),
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
						console.log('Enviado');
						
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

