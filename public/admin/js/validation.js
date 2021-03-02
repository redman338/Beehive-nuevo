
$().ready(function() {

		$("#changpwd").validate({

			rules: {

				password: {
					required: true,
					minlength: 5,
				},

				password_confirm: {
                    equalTo : "#password"
				},
			},

			messages: {
                
                password:{
	                required: "Por favor ingrese la contraseña",
					minlength: "Campo demasiado corto, minimo 5 characters"
					},

                password_confirm: {
                   	equalTo: "Las contraseñas no coinciden"
                }
            }

		});
	
		// validate signup form on keyup and submit
		$("#zonascomunesform").validate({
		
			rules: {
				
				name: {
					required: true,
					minlength: 2
				},
				description: {
					required: true,
					minlength: 5
				},
				valorxhora: {
					required: true,
					minlength: 1,
				},
				disponible: {
					required: true,
				},
				
			},
			messages: {
			
				name: {
					required: "Por favor ingrese el Nombre de la Zona",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				description: {
					required: "Por favor ingrese la Descripcion",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				valorxhora: {
					required: "Por favor ingrese el Costo del Alquiler x Hora",
					minlength: "campo demasiado corto, minimo 2 characters",
	
				},
				disponible: "Por favor seleccione una de las Opciones",
			
			}
		});

	$("#formreserva").validate({


		rules: {
				
				txtTitulo: {
					required: true,
					minlength: 2
				},
				txtHorastart: {
					required: true,
				
				},
				txtHoraend: {
					required: true,
					
				},
				description: {
					required: true,
					minlength: 5
				},
			},

		messages: {
			
				txtTitulo: {
					required: "Por favor ingrese el Nombre del Evento",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				txtHorastart: {
					required: "*",
					
				},
				txtHoraend: {
					required: "*",
					
	
				},
				description: {
					required: "Por favor ingrese una descripcion corta del evento",
					minlength: "campo demasiado corto, minimo 2 characters",
				},
			
			}
	});

	$("#copropiedadForm").validate({

			rules: {
				
				name: {
					required: true,
					minlength: 2
				},
				address: {
					required: true,
				
				},
				department: {
					required: true,
					
				},
				city: {
					required: true,
					minlength: 2
				},
				location: {
					required: true,
					minlength: 2
				},

				tipocopropiedad_id: {
					required: true,
				
				},
				area_comun: {
					required: true,
					minlength: 1
				},
				area_privada: {
					required: true,
					minlength: 1
				},
			},

		messages: {
			
				name: {
					required: "Este campo es requerido",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				txtHorastart: {
					required: "*",
					
				},
				txtHoraend: {
					required: "*",
					
	
				},
				description: {
					required: "Por favor ingrese una descripcion corta del evento",
					minlength: "campo demasiado corto, minimo 2 characters",
				},
			
			}


	});


	//FORM PROPIETARIO

$("#msform").validate({

			rules: {
				
				name: {
					required: true,
					minlength: 2
				},

				nit: {
					required: true,
					minlength: 4,
				
				},

				phone_1: {
					required: true,
					
				},
				
				phone_2: {
					required: true,
					
				},

				email: {
					required: true,
				
				},
				politica_datos: {
					required: true,
					
				},
				area_privada: {
					required: true,
					minlength: 1
				},
			},

		messages: {
			
				name: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				nit: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 4 characters"
					
				},
				phone_1: {
					required: "Este campo es requerido ***",
					
	
				},
				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},

				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},
				politica_datos: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters",
				},
			
			}


		});

	
	$("#form_prop_residente_1").validate({

			rules: {
				
				residente1: {
					required: true,
					minlength: 2
				},

				residente_1_cc: {
					required: true,
					minlength: 4,
				
				},

				email: {
					required: true,
					
				},
				
				
				
			},

		messages: {
			
				residente1: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				residente_1_cc: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 4 characters"
					
				},
				email: {
					required: "Este campo es requerido ***",
					
	
				},
				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},

				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},
				politica_datos: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters",
				},
			
			}


	});

	$("#arrendatario").validate({

			rules: {
				
				residente1: {
					required: true,
					minlength: 2
				},

				residente_1_cc: {
					required: true,
					minlength: 4,
				
				},

				email: {
					required: true,
					
				},
				
				
				
			},

		messages: {
			
				residente1: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters"
				},
				residente_1_cc: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 4 characters"
					
				},
				email: {
					required: "Este campo es requerido ***",
					
	
				},
				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},

				phone_2: {
					required: "Este campo es requerido ***",
					
	
				},
				politica_datos: {
					required: "Este campo es requerido ***",
					minlength: "campo demasiado corto, minimo 2 characters",
				},
			
			}



	});
	
});