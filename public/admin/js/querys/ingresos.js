$(document).ready(function($){

	
	var datatable = $("#datatable");
	var search = $("#btnBuscar");	
	
	// ************RUTAS *****************
		
		var urlshow 		= "registro";
		var urledit 		= "usuarios";
		var urledelete 		= "usuarios";
		var urlprofile 		= "admin/perfil/edit";


	// Variables INIT

	// ************PAGINACION *****************

	var $pagination = $('#pagination');
	var totalRecords = 0;
		records = [];
		displayRecords = [];
	var recPerPage = 20;
	var	page = 1;
	var totalPages = 0;
		
// *********************************************		
// ************LOAD REGISTROS *****************
function getRegistros(){

		let query = '';
	
	 $.ajax({
			 
			 	url: BASE_URL+'/api/obligaciones-getInvoice',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				data:{

					query : query,
					
				}, 		

				success: function(data){
					
                   
					datatable.empty();
					datatable.fadeIn( "slow", function() {
							
                    records = data;                  
                    totalRecords = records.length;
                    totalPages = Math.ceil(totalRecords / recPerPage);
                // ************PAGINACION *****************

				apply_pagination(records, totalRecords, totalPages);	

               
						
			
					});
				},
				error: function(){
					console.log("A ocurrido un error");
				},
				

			});
		return false;
	}	
		




//*********************************************
//*********************************************
// FUNCION BUSCAR ++++++++++++++++++++++++++++++

	$('#btnConsultar').click(function(){
			
        var year_id = $("#inputYear").val();
        var month_id = $("#inputMonth").val();

        console.log(year_id);
		
			datatable.empty();

		 $.ajax({
			 	

			 	url: BASE_URL+'/api/obligaciones-getInvoice',
				headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
				type: 'POST',
				dataType: 'json',
				
				data:{

					year_id : year_id,
					month_id : month_id,
				}, 		
			
				success: function(data){
					
                  
                    datatable.empty();
					datatable.fadeIn( "slow", function() {
							
                    records = data;                  
                    totalRecords = records.length;
                    totalPages = Math.ceil(totalRecords / recPerPage);
                // ************PAGINACION *****************

                    apply_pagination(records, totalRecords, totalPages);	
                    
                    });
				
				},
				error: function(){
					console.log("A ocurrido un error");
				},
				

			});
		return false;
	});

// +++++++++++++++++++++++++++++++++++


function apply_pagination(records, totalRecords, totalPages) {
    
		
      $pagination.twbsPagination({
        
            totalPages: totalPages,
            visiblePages: 6,
          
            onPageClick: function (event, page) {
                 
                  displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                  
                  endRec = (displayRecordsIndex) + recPerPage;
                 
                  displayRecords = records.slice(displayRecordsIndex, endRec);
                 	
                 	
                  generate_table(displayRecords);
            }
      });
}




function generate_table(records) {
      
    console.log(records);		
    var btndd = "<button class='btn btn-sm btndelete' onClick='clickButton()'  ><i class='fas fa-trash'></i></button>"
    var btn2 = "<input type='hidden' value='clic' onClick='clickButton()'>"
    var tr;

    datatable.html('');
 		
							
		for (var i = 0; i < records.length; i++) {
		       

		    
	            tr = $('<tr/>');
	            
		            tr.append("<td>" + records[i].numero_doc + "</td>");
		            tr.append("<td>" + records[i].inmueble + "</td>");
		            tr.append("<td>" + records[i].mes + "</td>");
		            tr.append("<td>" + records[i].daysinrecargo + "</td>");
		            tr.append("<td>" + records[i].total + "</td>");
		            tr.append("<td>" + records[i].status + "</td>");
					tr.append("<td>"+"<a class='btn btn-md btn-primary' onclick='updateModal("+records[i].id+")'><i class='fa fa-edit'></i></a></td>");

					tr.append("");
           							
           	
           	
           	
            datatable.append(tr);
     			}
     

    

      

		 }


 //getRegistros();





});



 //new User
 function updateModal(id){

	document.getElementById("document_id").value = id;


	

	$('#modalUpdate').modal('show');


	clearform();

}

