$(document).ready(function(){

	var	BASE_URL = 'http://localhost:8000';

	function getpost(newpost, location){

//wall_type, list_type, optional_id, limit, post_min_id, post_max_id, location
        $.ajax({
            url: BASE_URL + '/getposts',
            type: "POST",
            headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
            timeout: 5000,
            data:{},          
        
            success: function (render) {
               
                if (render != "") {
                    //$('.post-list .post_data_filter_' + location).remove();
                		listpost(render.posts);
                		console.log(render.posts)
                        $('.post-list').html(render.posts);
                    }
                               
                //$('.post-list-top-loading').hide();
                //$('.post-list-bottom-loading').hide();
               
            },
            error: function () {
                /*
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html('Something went wrong when loading your wall!');*/
                $('.post-list-top-loading').hide();
                $('.post-list-bottom-loading').hide();
                fetch_end = false;
            }
        });
    



}


function listpost(data)
{

		var boxlist = document.getElementById('list-post');	
		var div = document.createElement('div');
		var	plantilla;

			
			for (var i = 0; i < data.length; i++)
					{
						


			 plantilla +=

		        `<article class="post" >
              <div class="card bg-white p-relative">
                <div class="card-block">
                  
                  <div class="media">
                    <div class="media-left media-middle friend-box">
                      <!-- <a href="#">
                       				<img class="media-object img-radius m-r-20" src="" alt="">
			                      </a> -->
                            <a href="#">
                              <img class="media-object img-radius m-r-20" src="${BASE_URL+'/admin/icon/beehive/user.jpg'}" alt="">
                            </a>
                    </div>
                    
                    <div class="media-body">
	                      <div class="chat-header">
	                      		About Marta Williams
	                      </div>
	                      <div class="f-13 text-muted">
	                      		Jane 04, 2015
	                      </div>

                    
                        
                    </div>
                   
                  </div>
              	</div>
                                   
                <div id="lightgallery" class="lightgallery-popup">
                </div>
                <div class="card-block">
                  <div class="timeline-details">
                   	
														<p class="text-muted">
														${data[i].content}</p>
                  </div>
                </div>
                
                <div class="card-block b-b-theme b-t-theme social-msg">
                  <a href="#">
                		<i class="icofont icofont-heart-alt text-muted"></i>
                    	<span class="b-r-theme">Like (20)</span>
                  </a>
                 	
                 	<a href="#">
                    <i class="icofont icofont-comment text-muted"></i>
                      <span class="b-r-theme">Comments (25)</span>
                  </a>

                  <a href="" class="f-right"  onclick="deletepost(  )">
                      <i class="fa fa-trash text-muted"></i>

                      <span class="b-r-theme">Eliminar</span>
                  </a>

                 <a href="#" onclick="editpost()" class="f-right" id="editpost">
                      <i class="fa fa-edit text-muted"></i>
                      <span class="b-r-theme">Editar</span>
                  </a>
                     
                </div>
                      
                  <div class="card-block user-box">
                    <div class="p-b-20">
                      <span class="f-14"><a href="#">Comments (110)</a>
                      </span>
                      <span class="f-right">see all comments
                      </span>
                    </div>
                                      
                                    
	              </div>
              </div>
            </article>
		        `;
		      }


		  div.innerHTML= plantilla;
 			boxlist.appendChild(div);
	
}

$("#newPost").click(function(){
  
  
   	var formData = $(this).closest('#form-new-post').serializeArray();
  	formData.push({ name: this.name, value: this.value });

   	//console.log(formData);	
    
   	console.log(formData[0].value);
   		
   		$.ajax({

        url: BASE_URL+'/saveposts',
        type: "POST",
        timeout: 5000,
       	headers : {'X-CSRF-TOKEN' : $('[name="token"]').val() },
      	type: 'POST',
		dataType: 'json',
		data:{

				content:  formData[0].value,
						
			},

        

    
        success: function(response){
            if (response.code == 200){
                $("#content").val("");

              	console.log(response);
              		newpost = 1;
                	location = 'top';
                getpost(newpost, location);
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
               	console.log(response);
            }
        },
        error: function(response){
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            console.log(response);
        }
    	
    	});
	

		
	});

	getpost();

});