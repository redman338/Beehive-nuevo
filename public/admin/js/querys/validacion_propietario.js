$(document).ready(function(){

	


		$.ajax({

			url: BASE_URL+'/cliente/getvalidacionpropietario',
			headers: {'X-CSRF-TOKEN' : $('[name="token"]').val() },
			type: 'POST',
			dataType: 'json',

			success: function(data){

					response(data);
			},

		});


		function response(data)
		{

			//alert("hola desde response");

			var propietario = data;
			//var box = document.getElementByID('box_validation');
			var box = $('#box_validation');
			var message = $('#message');

			if(propietario == 0)
				{

					box.html('');
					message.html('');

					var text = 'Debes completar primero el Registro de Propietarios';
					var link = `<div class="row justify-content-center">
                                    <div class="col-3"> 
                                    	<div class="img-icon-menu">
	                                        <a href="/cliente/propietario" class="link_propietario_residente">
	                                            <img src="/admin/icon/beehive/icons-residente.png" class="fit-image">
	                                              <p class="title_icon">Propietario</p>
	                                        </a>
	                                    </div>
                                    </div>
                                </div>`;

					message.append(text);
					box.append(link);

				}

			//console.log(data);
		}

});