 <!-- Formulario Create -->
             
    <div class="row">                
          
      <div class="inmueble">
       
         <div class="row">
              <div class="col-lg-6 col-md-6">
                                     
                    <h3 class="text-primary">Datos del Inmueble</h3>
                      
                      <span class="txt-muted d-inline-block">Informacion Basica del Inmueble </span>
                      
              </div>

              <div class="col-lg-6 col-md-6">
                                     
                   <!--  <h3 class="text-primary">Estado</h3> -->
                      
                     
                      
              </div>
            </div>
        <div class="row p-t-20">   

               <div class="col-lg-12">
                      <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                          <label class="col-sm-5 col-form-label">Propietario *</label>
                          

                           <div class="col-md-4 col-lx-4 col-sm-12" > 


                            <input type="hidden" id="idUser" name="user_id" value="">

                            <input type="text" 
                            class="form-control form-txt-primary form-control-primary" 
                            name="username" id="search_profiles"
                            placeholder="Nombre / CC">                    
                            <!--  <select name="user_id" id="get_profiles" class="form-control form-txt-primary form-control-primary"
                             placeholder="--Seleccione--" required>
                                    

                              </select> -->
                          </div>


                          <div class="col-md-1">
                          
                            <button type="button" class="btn btn-inverse waves-effect" id="user_search"><i class="fa fa-search"></i></button>
                          </div>


                          <div class="col-md-2">
                          
                            <button type="button" class="btn btn-inverse waves-effect" id="newuser"><i class="fa fa-plus"></i><i class="fa fa-user"></i></button>
                          </div>
                      </div>
                </div>

          <div class="col-lg-12">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Tipo de Inmueble</label>
                  <div class="col-sm-7">
                          
                           {!! Form::select('tipoinmueble_id',
                           [ null => '-- Selecciona ---']+ $tipoinmuebles,
                            null, 
                           ['class' => 'form-control form-txt-primary form-control-primary']) !!}
                  </div>
              </div>
            </div>


            <div class="col-lg-12 p-t-10">
              
                
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Nombre / Codigo</label>
                      <div class="col-sm-7">
                              {{ Form::text('name', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre / Codigo']) }}
                      </div>
                </div>
          

            </div>

            <div class="col-lg-12">
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Bloque</label>
                <div class="col-sm-7">
                 

                    {!! Form::select('bloque_id',
                     [ null => '-- Selecciona ---']+ $bloques,
                      null, 
                     ['class' => 'form-control form-txt-primary form-control-primary']) !!}
                </div>
              </div>
            </div>

            <div class="col-lg-12 ">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Descripcion</label>
                    <div class="col-sm-7">
                            {{ Form::text('description', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => 'Descripcion']) }}
                    </div>
              </div>
          
            </div>

                    
          </div>
      </div>
 
</div>
<!--ROW Fila Principal -->
<hr>
   
  <input type="hidden" name="token" value="{{ csrf_token() }}">

@section('scripts')
  
 
   <script src="{{ asset('admin/js/validation.js') }}"></script>
   <script src="{{ asset('admin/js/querys/inmueble.js') }}"></script>

@endsection           
        


         


        
  
