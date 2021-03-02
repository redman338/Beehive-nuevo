"use strict";
	$(document).ready(function() {

		var alertinfo 	= $('#alertinfo');
		var alert 		= $('#alert');
		var messaje 	= $('#messaje');
		alertinfo.hide();


		 $('#formreserva').submit(function(event){

		 	var subStart;

		 	var cadena = $('#txtFecha').val();
		    var inicio = 0;
		    var fin    = 10;
		   
		    subStart = cadena.substring(inicio, fin);
		    console.log(subStart);

			event.preventDefault();
				$.ajax({

						url: BASE_URL+'/api/post/reservas',
						headers : {'X-CSRF-TOKEN' : $('[name="token"]').val()},
						type:'POST',
						dataType: 'json',
						data: {

							title: 				$('#txtTitulo').val(),
							start:				subStart,
							start_time:       	$('#txtHorastart').val(),
							end: 				subStart,
							end_time: 			$('#txtHoraend').val(),
							color:   			"#4680ff",
							description:  		$('#description').val(),
							textColor: 			"#FFFFFF",						
							zonacomun_id: 		$('#zonacomun_id').val(),

						},

						success:function(response){

									
							
								console.log(response);
						
									
									document.getElementById("formreserva").reset();
									
									$('#calendar').fullCalendar('refetchEvents');
									$("#modalreserva").modal('hide');
									location.reload(); 

									
						},
						error: function(response){
								
								
								respuesta(response);
						}
				});
		});



		 function respuesta(response){

		 		//Reiniciar formulario
		 		document.getElementById("formreserva").reset();

		 		//Enviar mensaje
		 		messaje.html(response.responseJSON.message);
		 		alert.addClass("alert-danger");

		 		//ocultar modal
				$("#modalreserva").modal('hide');
				alertinfo.show();
				
				console.log(response.responseJSON.message);

		 }
});