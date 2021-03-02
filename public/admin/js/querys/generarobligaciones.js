$(document).ready(function($){
	
	/*********FORMULARIO TIPO IDENTIFICACION
	/***********************************************/
	
	var newconcept = $('#newconcept');
	var token = $('#token');
	var click = 1;
	
	newconcept.on("click", function(){
		
			$.ajax({
					
					url: BASE_URL+'/get/conceptosfinancieros/',
					headers : {'X-CSRF-TOKEN' : $('#token').val()},
					type: 'GET',
					dataType: 'json',
									
				success:function(data){
				
					console.log(data);
   						
						click = click +1;
   						modalconceptos(data , click);


   										
						
					}
				});

	
		});



function modalconceptos(data, click){

		var boxconcept = document.getElementById('boxconcept');
		var cont = 1 ;
		var	plantilla;
		var	option ;

		var div = document.createElement("DIV");
		
		for (var i = 0; i < data.length; i++)
					{
						option += ` 
		        				<option value="${data[i].id }">${data[i].name }</option>
		        			`;	
		  				}

		plantilla =
		  		` <div class="form-group row">
		       		<label class="col-sm-5 col-form-label">Conceptos Financiero ${ click }:</label>

		       			 <div class="col-sm-5" >
		       			 	<select name="concepto_id[]" id="selectConceptos" class="form-control 
		       			 		form-txt-primary form-control-primary">
									
									<option value="0"> -- Seleccione --</option>
								${option}
		       			 	</select>
		      		
                        </div>
                   </div> 

                 <div class="form-group row">                        
                    	<label class="col-sm-5 col-form-label">Valor Concepto * :</label>  
		       			
		       			<div class="col-sm-5">
		       				<input class="form-control form-txt-primary form-control-primary" id="valor" placeholder="$" name="valor[]" type="text">
		       			</div>
		       		</div>
		        `;
				
 			div.innerHTML= plantilla;
 			boxconcept.appendChild(div);
		  		

	}
 });

	