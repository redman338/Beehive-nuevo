	"use strict";
	$(document).ready(function() {
	    $('#external-events .fc-event').each(function() {

	        // store data so the calendar knows to render an event upon drop
	        $(this).data('event', {
	            title: $.trim($(this).text()), // use the element's text as the event title
	            stick: true // maintain when user navigates (see docs on the renderEvent method)
	        });

	        // make the event draggable using jQuery UI
	        $(this).draggable({
	            zIndex: 999,
	            revert: true, // will cause the event to go back to its
	            revertDuration: 0 //  original position after the drag
	        });

	    });

	    //******************************
	    //TRAER OBJETO CON LAS RESERVAS
	   	var reservas;
	   
			    $.ajax({

			    	url: BASE_URL+'/api/get/reservas',
						headers : {'X-CSRF-TOKEN' : $('[name="token"]').val()},
						type:'POST',
						dataType: 'json',
						
						data: {
													
									zonacomun_id: $('#zonacomun_id').val(),

								},

						success:function(response){

											console.log(response);
											
											reservas = response; 
											
											eventos(reservas);
											calendar(reservas);
								},
						});

	function calendar(reservas){

	    		var d = new Date();
					var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
				

			    $('#calendar').fullCalendar({
					        
					    header: {
					    
					          left: 'prev,next today',
					          center: 'title',
					          right: 'month,agendaWeek,agendaDay,listMonth'
					        },
			        defaultDate: 		strDate,
					    navLinks: 			true, // can click day/week names to navigate views
					    businessHours: 	true, // display business hours
					    editable: 			true,
					    droppable: 			true, // this allows things to be dropped onto the calendar
					    
					    drop: function() {
			            // is the "remove after drop" checkbox checked?
			            if ($('#checkbox2').is(':checked')) {
			                // if so, remove the element from the "Draggable Events" list
			                $(this).remove();
			            }
	        		},

			        dayClick:function(date, jsEvent,view){
			        	$( "#txtFecha" ).val(date.format());

			          	$("#modalreserva").modal();
			        },

	        		// events: 'http://localhost:8000/api/get/reservas',

	        		events:reservas,
	        
			        eventClick:function(calEvent,jsEvent,view){
			        	$('#tituloEvento').html(calEvent.title);
			        	$('#horainicio').html(calEvent.descripcion);
			        	$('#horafin').html(calEvent.end);
			        	$('#modalevent').modal();
			        },


	   	});


	

	}


	function eventos(reservas){

		var boxeventos = document.getElementById('boxeventos');	


		var text = "";

			for (var i = 0; i < reservas.length; i++)
			{
		 		

		 		text +=

		        ` 
							<div class="fc-event ui-draggable ui-draggable-handle">${reservas[i].title }</div>
		        
		        `;

		  }

		  boxeventos.innerHTML= text;
	}



});