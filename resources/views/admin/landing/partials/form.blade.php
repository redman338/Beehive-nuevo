 <!-- Formulario Create -->
<div class="row">
    
  <div class="col-lg-6 col-xs-12 product-detail" id="product-detail">

                
    <div class="col-sm-12 col-lg-12 p-t-30">
      <div class="row">
         <label class="col-sm-5 col-form-label">Url Amigable: *</label>

        <div class="col-sm-7">
      
          {{ Form::text('slug', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'slug', 'placeholder' => 'Url Amigable', 'required' => 'required']) }}


        </div>
      </div>
    </div>

    <hr>

    <div class="col-sm-12 col-lg-12  p-t-10 ">
      <div class="row">
         <label class="col-sm-5 col-form-label">Logo *</label>

            <div class="form-margin">
              <div class="drop_files">
                <form method="POST"  
                     enctype="multipart/form-data" 
                     class="dropzone" 
                     id="dropzoneFrom"
                     action="{{url('copropiedad/uploading')}}">
                        
                          @csrf
                        
          
                </form>
                 
                   
                  <div align="center" class="p-t-10">
                    <button type="button" id="upload" class="btn btn-info" ><i class="fa fa-upload"></i>Cargar</button>
                  </div>
              </div>
            </div>   
      </div>
    </div>
    
    <div class="col-lg-12 p-t-10 ">
      <div class="row">
         <label class="col-sm-5 col-form-label">Banner Principal: *</label>

        <div class="col-md-7 col-lg-7 col-sm-7">
          <input type="file" name="banner">
                 
        </div>
      </div>
    </div>

    
    <div class="col-lg-12 p-t-10">
      <div class="row">
        <label class="col-sm-5 col-form-label">Tarjeta 1 *</label>
          <div class="col-md-7 col-lg-7 col-sm-7">
            <input type="file" name="banner">
          </div>
        </div>
      </div>

    <div class="col-lg-12 p-t-10">
      <div class="row">
        <label class="col-sm-5 col-form-label">Tarjeta 2 *</label>
          <div class="col-md-7 col-lg-7 col-sm-7">
            <input type="file" name="banner">
          </div>
        </div>
      </div>

    <div class="col-lg-12 p-t-10">
      <div class="row">
        <label class="col-sm-5 col-form-label">Tarjeta 3 *</label>
          <div class="col-md-7 col-lg-7 col-sm-7">
            <input type="file" name="banner">
          </div>
        </div>
      </div>

    <div class="col-lg-12 p-t-10">
      <div class="row">
        <label class="col-sm-5 col-form-label">Tarjeta 4 *</label>
          <div class="col-md-7 col-lg-7 col-sm-7">
            <input type="file" name="banner">
          </div>
        </div>
      </div>


       
      <div class="col-lg-12 p-t-10">
           <div class="row">
             <label class="col-sm-5 col-form-label">Descripcion del Conjunto *</label>

                <div class="col-md-7 col-lg-7 col-xs-12">
                  <textarea class="form-control" rows="4"></textarea>

                </div>
          </div>
      </div>

       <div class="col-lg-12 p-t-10">
          <div class="row">
             <label class="col-sm-5 col-form-label">Informacion Principal *</label>
               <div class="col-md-7 col-lg-7 col-xs-12">
                  <textarea class="form-control" rows="4"></textarea>
              </div>
          </div>
        </div>

        <div class="col-lg-12 p-t-10">
          <div class="row">
             <label class="col-sm-5 col-form-label">Informacion de Contacto *</label>
               <div class="col-md-7 col-lg-7 col-xs-12">
                  <textarea class="form-control" rows="4"></textarea>
              </div>
          </div>
        </div>
  
  </div>      
</div>
<!--ROW Fila Principal -->
<hr>
              
             
        
            <div class="row p-t-20">
               <div class="col-lg-12 col-sm-12 mob-product-btn">
                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">
                        <i class="icofont icofont-save f-16"></i><span class="m-l-10">GUARDAR</span>
                    </button>
                    <a href="{{route('copropiedad.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Cancelar</a>
                    
                </div>
            </div>
      


      <input type="hidden" name="token" value="{{ csrf_token() }}">



       

