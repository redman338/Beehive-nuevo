

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalform">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        


      <div class="modal-body">
           

        <form id="dataForm" action="#">
                   <div class="col-lg-12">
                     <div class="form-group row {{ $errors->has('username') ? ' has-error' : '' }}">
                          <label class="col-sm-5 col-form-label">Nombre Completo o Razon Social *</label>
                          
                           <div class="col-md-6 col-lx-6 col-sm-12">
                               {{ Form::text('username', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'username', 'placeholder' => 'Nombre', 'required' => 'requiered']) }}
                          </div>

                          
                      </div>                     
                    </div>


                    <div class="col-lg-12">
                       <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                            <label class="col-sm-5 col-form-label">Telefono *</label>
                            
                             <div class="col-md-6 col-lx-6 col-sm-12">
                                 {{ Form::text('phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Telefono' ,'required' => 'requiered']) }}
                            </div>

                            
                        </div>                     
                    </div>

                    <div class="col-lg-12">
                       <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                            <label class="col-sm-5 col-form-label">Nit / CC *</label>
                            
                             <div class="col-md-6 col-lx-6 col-sm-12">
                                 {{ Form::text('nit', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'nit', 'placeholder' => 'Nit / CC', 'required' => 'requiered']) }}
                            </div>

                            
                        </div>                     
                    </div>

                    <div class="col-lg-12">
                     <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                          <label class="col-sm-5 col-form-label">Correo Electronico *</label>
                          
                           <div class="col-md-6 col-lx-6 col-sm-12">
                               {{ Form::text('email', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'email', 'placeholder' => 'email', 'required' => 'requiered']) }}
                          </div>

                          
                      </div> 
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group row">

                         <label class="col-sm-5 col-form-label">{{ Form::label('role' , 'Rol: ')}}*</label>
                          
                          <div class="col-md-6 col-lx-6 col-sm-12">
                            {!! Form::select('role',
                              [ null => '--Seleccione ---']+ $roles,
                              null, 
                               ['id' => 'role',
                               'class' => 'form-control form-txt-primary form-control-primary', 
                               'requiered' => 'requiered']) !!}
                          </div>

                      </div>
                    </div>
        
      

        </div>  


    

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>   
        
        </form>


    </div>
  </div>
</div>


