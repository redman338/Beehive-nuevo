$(document).ready(function(){


	$(".formcomments").submit(function(event){

		event.preventDefault();
		
		var formData = $(this).closest('.formcomments').serializeArray();
  			
  		formData.push({ name: this.name, value: this.value });
		
			savecomment(formData);

	});


	function savecomment(data){	
				
			
			$.ajax({
					
					url: '/savecomments',
		 			headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
		 			type: 'POST',
		 			dataType: 'json',
		 			data:{

		 				post_id: 		data[1].value,
						body: 			data[0].value,
						
					},
					success:function(data){
					
        				//clearform();
        				if(data.code == 404)
        				{

	       					$.each(data.errors, function(key, value){

												console.log(key+'='+value);
												toastr.error(value);
										});
	       				}
	       				if(data.code == 202)
	       				{
	       						
	       						toastr.success(data.message);
	       						var body = $(".comments").val('');
						   		window.location.replace("/micomunidad");
	       				}
       			
						
					},
					error: function(data){
							
								$.each(data.responseJSON.errors, function(key, value){

											console.log(key+'='+value);
											toastr.error(value);
							});
						
					}
				});

		
			}
		// });

});