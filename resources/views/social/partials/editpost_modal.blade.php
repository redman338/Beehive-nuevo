

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editpost_modal">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Publicacion 
          </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        


      <div class="modal-body">
           
              <input id="editpost_id" type="hidden" value="">

     

            <div class="row">
              <div class="col-md-12">
                  <div class="card bg-white">
                      <div class="post-new-contain row card-block">
                          <div class="col-md-1 col-xs-3 post-profile">
                              <img src="{{url('admin/icon/beehive/user.jpg')}}" class="img-fluid" alt="">
                          </div>
                          <form id="formpost" class="col-md-11 col-xs-9">
                              <div class="">
                                  <textarea id="edit_message" class="form-control post-input" rows="3" cols="10" required="" placeholder="Escribe algo....."></textarea>
                              </div>
                          </form>
                      </div>
                   
                    <div class="post-new-footer b-t-muted p-15">
                        <span class="image-upload m-r-15" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Photos">
                            <label for="file-input" class="file-upload-lbl">
                              <i class="icofont icofont-image text-muted"></i>
                            </label>
                           
                            <input id="file-input" type="file" accept="/image/x-png,image/gif,image/jpeg">
                          </span>
                            
                           
                            <span>

                               
                              <button type="button" id="actualizar_post" class="btn btn-primary  waves-light f-right">Actualizar</button>
                            </span>
                           
    
                               
                             <!--<button type="submit" class="btn btn-primary f-right">Post</button>-->
                        </div>
                    </div>
                </div>
              </div>
           
                 
        </div>  


    

          
       


    </div>
  </div>
</div>



