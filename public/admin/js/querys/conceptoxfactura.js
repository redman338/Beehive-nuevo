$(document).ready(function($){
	
	/*********FORMULARIO TIPO IDENTIFICACION
	/***********************************************/
	
	var newconcept = $('#newconcept');
	var token = $('#token');
	
	
	
	newconcept.click(function(){
		
			$.ajax({
					
					url: BASE_URL+'/get/conceptosfinancieros/',
					headers : {'X-CSRF-TOKEN' : $('#token').val()},
					type: 'GET',
					dataType: 'json',
									
				success:function(data){
						
					newConceptBox(data);
   							
					
					}
				});
			});

	
	function newConceptBox(data)
	{

	
		var boxconcept = document.getElementById('boxconcept');	


		var text = "";

			 text +=

		        ` <div class="col-sm-5"></div>
		       		<div class="col-sm-5"> 
		       			<input class="form-control form-txt-primary form-control-primary" id="description" placeholder="$" name="valor" type="text">
		       		</div>
		        `;


		     boxconcept.innerHTML= text;
		}


 });