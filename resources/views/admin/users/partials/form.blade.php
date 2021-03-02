 
 <!-- Formulario Create -->
  <div class="row">
    
    <div class="col-lg-12">
      <h3 class="text-primary">Configuracion Login Usuarios</h3>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
      
      
      <div class="form_userdetail">
        <div class="col-lg-12 p-t-10">
                            
          <div class="form-group">
            {{ Form::label('name', 'Nombre de usuario: ')}}
            {{ Form::text('name', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'username']) }}
          </div>
                                
        </div>

        <div class="col-lg-12 p-t-10">
                            
          <div class="form-group">
            {{ Form::label('email' , 'Correo Electronico: ')}}
           
            {{ Form::text('email', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'nit', 'placeholder' => 'email']) }}
          </div>
                                
        </div>

      </div>


      


    </div>

    <div class="col-lg-6 col-md-6 col-xs-12 " >
       <div class="form_userdetail">
        

          <div class="col-lg-12 p-t-10">
            <div class="form-group">

              {{ Form::label('role' , 'Rol: ')}}
             
              {!! Form::select('role',
                [ null => '--Seleccione ---']+ $roles,
                null, 
                 ['class' => 'form-control form-txt-primary form-control-primary',
                 'required' => 'required']) !!}

            </div>
          </div>

           <div class="col-lg-12 p-t-10">
            <div class="form-group">

              {{ Form::label('status' , 'Estado: ')}}
             
              {!! Form::select('status',
                [ null => '--Seleccione ---']+ $status,
                null, 
                 ['class' => 'form-control form-txt-primary form-control-primary',
                 'required' => 'required']) !!}
            </div>
          </div>
        </div>
      </div>


    </div>

    <hr>
   
              
        <div class="row p-t-10">
            
            <div class="col-md-6">
               <div class="form-group row">
                  <div class="col-md-3">
                    <label>Reiniciar Contraseña:</label>
                  </div>

                  <div class="col-md-7">
                    <div class="border-checkbox-section">
                      <div class="border-checkbox-group border-checkbox-group-primary">
                        <input class="border-checkbox" type="checkbox" id="checkbox1"
                        name="reset_password"
                        value="1">
                        <label class="border-checkbox-label" for="checkbox1">Si</label>
                      </div>
                    </div> 
                    
                  </div>
                               
              </div>
            </div>
        </div>
        

      </div>
    </div>
  </div>
</div>
<!--ROW Fila Principal -->
  
  <hr>
              
        