$(document).ready(function(){
	
	/*********FORMULARIO TIPO IDENTIFICACION
	/***********************************************/
	var form1 = $('.form1');
	var form2 = $('.form2');
	var tipo_identificacion = $('#tipo_identificacion');

	var value = $("#tipo_identificacion").val();


		if( value != 2  )
		{
			form2.hide();
		}
	
	// form2.style.display = "none";
	
	tipo_identificacion.click(function(){
			
			var val = $("#tipo_identificacion").val();
			
			if( val == 1){

				form2.hide();
				form1.show();
			}
			if( val == 2){

				form1.hide();
				form2.show();
			}

			if( val == 3){

				form2.hide();
				form1.show();
			}
		});

	});
