 
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

              {{ Form::label('rol' , 'Rol: ')}}
             
              {{ Form::text('role', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'role', 'placeholder' => 'Rol']) }}
            </div>
          </div>

           <div class="col-lg-12 p-t-10">
            <div class="form-group">

              {{ Form::label('status' , 'Estado: ')}}
             
              {{ Form::text('status', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'status', 'placeholder' => 'Estado']) }}
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr>
    
    <div class="row p-t-10">
      
         <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="form-group">

              {{ Form::label('password' , 'Contraseña: ')}}
             
              {{ Form::password('password', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Contraseña']) }}
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-xs-12">
              <div class="form-group">
                {{ Form::label('password-confirm' , 'Confirmar Contraseña: ')}}
                 
                {{ Form::password('password-confirm', null, ['class' => ' form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Confirmar Contraseña']) }}             
                           
              </div>
          </div>
        </div>
          
        <!-- $user == $profile -->
            <input type="hidden" name="profile_id" value="{{ $user->id}}">

      </div>
    </div>
  </div>
</div>
<!--ROW Fila Principal -->
  
  <hr>
              
          
