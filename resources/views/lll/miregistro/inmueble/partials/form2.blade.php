 <!-- Formulario Create -->
             
    <div class="row">                
          
          <div class="inmueble">
    
            <div class="row">
                <div class="col-md-10 col-lg-10 col-xs-12">
                   <h4 class="text-primary">Copropiedad</h4>
                   <!--  <span class="txt-muted d-inline-block">Informacion General </span> -->
                    
                      <div class="col-lg-12 p-t-20">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Copropiedad</label>
                          <div class="col-sm-7">
                             

                               {!! Form::select('copropiedad_id',
                                 [ null => '-- Selecciona ---']+ $copropiedades,
                                  null, 
                                  ['class' => 'form-control form-txt-primary form-control-primary']) !!}

                             
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Propietario</label>
                          <div class="col-sm-5">
                        
                                {!! Form::select('profile_id',
                                 [ null => '-- Selecciona ---']+ $profiles,
                                  null, 
                                  ['class' => 'form-control form-txt-primary form-control-primary']) !!}

                          </div>


                          <div class="col-md-2">
                          
                            <button type="button" class="btn btn-inverse waves-effect" id="newuser"><i class="fa fa-plus"></i><i class="fa fa-user"></i></button>

                          </div>
                        </div>
                      </div>
                  </div>
                </div>

              
               

              <div class="row p-t-20" id="userform">                
                <hr>
                
                <div class="col-md-12 col-lg-12">
                  <h4 class="sub-title">Agregar Propietario</h4>
                </div>

                       <div class="col-md-12 col-lg-12">
                         <div class="form-group row ">
                              <label class="col-md-5 col-sm-5 col-form-label">Nombre Completo o Razon Social *</label>
                              
                               <div class="col-md-7 col-lg-7 col-sm-12">
                                   {{ Form::text('username', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'username', 'placeholder' => 'Nombre']) }}
                              </div>                              
                          </div>                     
                        </div>

                        <div class="col-md-6 col-lg-6">
                           <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                                <label class="col-sm-5 col-form-label">CC / Nit *</label>
                                
                                 <div class="col-md-7 col-lg-7 col-sm-12">
                                     {{ Form::text('nit', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'nit', 'placeholder' => 'Nit / CC']) }}
                                </div>                              
                            </div>                     
                        </div>


                        <div class="col-lg-6 col-md-6">
                          <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                                  <label class="col-sm-5 col-form-label">Telefono *</label>
                                  
                                   <div class="col-md-7 col-lg-7 col-sm-12">
                                       {{ Form::text('phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Telefono']) }}
                                  </div>

                                  
                            </div>                     
                          </div>


                        <div class="col-lg-12 col-md-12">
                          <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                                  <label class="col-sm-6 col-form-label">Correo Electronico *</label>
                                  
                                   <div class="col-md-6 col-lg-6 col-sm-12">
                                       {{ Form::text('email', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'email', 'placeholder' => 'email']) }}
                                  </div>

                                  
                            </div>                     
                          </div>
                     
                   
                      <!-- UserForm -->

                  </div>

            <hr>
    
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
              <div class="form-group row">
                <label class="col-sm-5 col-form-label">Tipo de Inmueble</label>
                  <div class="col-sm-7">
                          
                           {!! Form::select('tipo_inmueble_id',
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
                 

                    {!! Form::select('bloque',
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
   
@section('scripts')
  
 
  
   <script src="{{ asset('admin/js/querys/inmueble.js') }}"></script>

@endsection           
        


         


        
  
