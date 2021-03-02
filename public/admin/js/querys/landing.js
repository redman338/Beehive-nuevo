$(document).ready(function(){

    var value_id =  document.querySelectorAll('.landing')[0].value;

    $(".value_id").val(value_id);
});

function upload_click(form){

		
		$(form+' .image-input').click();
		console.log(form);

}
	
function previewPostImage(input, form){
   
    var form_name = form;

    console.log('forname: ' +form_name);
    
    box_upload = $(form_name+ " .box_uploading").addClass("none");
    
        

      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
          		$(form_name + ' .image-area').removeClass( "none" );
          		$(form_name + ' .options').removeClass("none");
              	$(form_name + ' .image-area img').attr('src', e.target.result);
              //$(form_name + ' .image-area').show();
          };

          reader.readAsDataURL(input.files[0]);
      } 

      //$(form_name + ' .loading-post').hide();
    }

function removePostImage(form){
   		
   		var form_name = form;
  	
      
     	$(form_name + '.image-area img').attr('src', " ");
     	$(form_name + ' .image-area').addClass("none");
   
    	$(form_name + ' .image-input').val("");
     
    	$(form_name+ ' .options').addClass("none");
      $(form_name+ " .box_uploading").removeClass("none");
      	
      	
}

	

function savePostImage(form)
{

	var data = new FormData();

	var id =  document.querySelectorAll('.landing')[0].value;
		data.append('id', id);

	var option =  document.querySelectorAll(form +' .saveoption')[0].value;		
		data.append('value', option);
  

	var file_inputs = document.querySelectorAll(form +' .image-input');
	
	 $(file_inputs).each(function(index, input) {
        data.append('image', input.files[0]);
    });

	//console.log(data);
	 
	 $.ajax({
        
        url: BASE_URL+'/landing/uploads',
        headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
        type: "POST",
        timeout: 5000,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
       
        

        success: function(response){
           
            if (response.code == 200){
                
                removePostImage(form);
              	console.log(response);
              	toastr.success(response.message);
            }
            else{
               console.log("error: "+response);
            }
        },
        

        error: function(response){
            console.log("error_error: "+response);
        }
    });
}


function makeSerializable(elem) {
    return $(elem).prop('elements', $('*', elem).andSelf().get());
}


