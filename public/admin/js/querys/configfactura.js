$(document).ready(function($){
	
	/*********FORMULARIO TIPO IDENTIFICACION
	/***********************************************/
	
	var copropiedad_id = $('#copropiedad_id');
	var token = $('#token');
	
	// form2.style.display = "none";
	
	copropiedad_id.click(function(){
			
			var query = $("#copropiedad_id").val();	
			console.log(query);

			$.ajax({
					
					url: BASE_URL+'/buscar/conceptosfinancieros/',
					headers : {'X-CSRF-TOKEN' :  $('[name="token"]').val()},
					type: 'GET',
					dataType: 'json',
					data:{
						query:query,
					},
				
				success:function(data){
						
					
   					conceptosfinancieros(data);					
					
					}
				});
		});



function conceptosfinancieros(data){

		var cptf = document.getElementById('checkconceptos');
		cptf.innerHTML = '';
		var text = "";
			
      									
			for (var i = 0; i < data.length; i++) {
		          
		        text +=

		        `<label>
		        	<input type="checkbox" id="conceptos" value="${ data[i].id }" name="checkconceptos[]">
		       			<span class="cr">
		        			<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
		        		</span>	
		        	
		        	<span>  ${data[i].name } - $ ${ new Intl.NumberFormat().format(data[i].valor)}</span>
		        </label><br>
		        `;
		        
		        }

		    cptf.innerHTML= text;



 	}

 });