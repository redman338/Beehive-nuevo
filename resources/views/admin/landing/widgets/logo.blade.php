<form action="" id="formlogo">

    <div class="row options none " >
      <div class="col">
         <a href="" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i>Cancelar</a>
      </div>
     
      <div class="col">
          <a onclick="removePostImage('#formlogo')" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Remover</a>
      </div>
      
      <div class="col">
        <a onclick="savePostImage('#formlogo')" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Guardar</a>
      </div>

     

    </div>
      

    <div class="row p-t-10 m-l-10" >
       <div class="box_uploading">        
            <div class="box_upload" >
                    
                     <a onclick="upload_click('#formlogo')" class="no-btn">
                        <div class="tex-upload" id="" >
                          <i class="material-icons text-muted">cloud_upload</i><br>
                        Drag &amp; Drop here or click
                        
                        </div>
                      </a>   
            </div>
        </div>
    </div>

    <div class="image-area none">
        <img src="" / >
    </div>
  
    
    <input type="hidden" class="saveoption" name="option" value="url_logo">
               
    <input type="file" accept="image/*" class="image-input" name="image"
          onchange="previewPostImage(this, '#formlogo');" style="display: none">
        
</form>

 