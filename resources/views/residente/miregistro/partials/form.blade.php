<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Formulario de Registro</strong></h2>
                <p>Datos Basicos del Residente</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                      
                   <form id="msform">
                      
                            <!-- progressbar -->

                         
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Datos del Residente</strong></li>
                                <li id="car"><strong>Vehiculo</strong></li>
                                <li id="employee"><strong>Colaborador</strong></li>
                                <li id="dog"><strong>Mascota</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>  <!-- fieldsets -->
                        
                 
                            <fieldset>
                                
                                <div class="form-card">
                                    
                                    <h2 class="fs-title">Informacion Basica</h2>
                                       

                                      <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('Nombre', 'Nombre Residente 1: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Nombre completo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('Identificacion', 'Identificacion: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_1_cc', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'phone_2', 'placeholder' => 'CC / NIT']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>


                                    
                                        <div class="col-lg-12 ">
                                           {{ Form::label('phone', 'Telefono: *')}}
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_1_phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'residente_1_phone_1', 'placeholder' => 'Telefono fijo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_1_celular_1', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'residente_1_celular_1', 'placeholder' => 'Celular']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-lg-12 p-t-10">
                                           {{ Form::label('email', 'Email: *')}}
                                           <div class="form-group">

                                            <div class="row">
                                              <div class="col-md-8">
                                                 {{ Form::text('email', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'email', 'placeholder' => 'Correo Electronico']) }}
                                              </div>

                                              <div class="col-md-4">
                                                <div class="form-group row">
                                                  <div class="col-md-6">
                                                    <label>Crear Cuenta:</label>
                                                  </div>

                                                  <div class="col-md-6">
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

                                        <hr>

                                        <!-- RESIDENTE 2 -->

                                        <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('Nombre', 'Nombre Residente 2: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Nombre completo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('Identificacion', 'Identificacion: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_1_cc', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'phone_2', 'placeholder' => 'CC / NIT']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-lg-12 ">
                                           {{ Form::label('phone', 'Telefono: *')}}
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_2_phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'residente_1_phone_1', 'placeholder' => 'Telefono fijo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_2_celular_1', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'residente_1_celular_1', 'placeholder' => 'Celular']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                </div> <input type="button"  name="next" class="next btn btn-md btn-primary " value="Continuar" />
                            </fieldset>
                            


                             <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Vehículo</h2>

                                      <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('vehiculo_tipo', 'Vehiculo Tipo: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_tipo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Tipo Vehículo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('vehiculo_marca', 'Marca: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_marca', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'vehiculo_marca', 'placeholder' => 'Marca']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>


                                        <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('vehiculo_modelo', 'Modelo: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_modelo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'vehiculo_modelo', 'placeholder' => 'Modelo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('vehiculo_placa', 'Placa: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_placa', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'vehiculo_placa', 'placeholder' => 'Placa']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>


                                       <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('vehiculo_color', 'Color: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_color', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'vehiculo_color', 'placeholder' => 'Color']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('vehiculo_parqueadero', 'Parqueadero: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('vehiculo_parqueadero', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'vehiculo_parqueadero', 'placeholder' => 'Parqueadero']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>

                                </div> 


                                <input type="button" name="previous" class="previous action-button-previous" value="Atras" /> <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>
                             


                               <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Colaborador</h2>

                                      <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('colaborador_nombre', 'Nombre Colaborador: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_nombre', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'colaborador_nombre', 'placeholder' => 'Nombre Colaborador']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('colaborador_direccionresidencia', 'Direccion Residencia: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_direccionresidencia', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'colaborador_direccionresidencia', 'placeholder' => 'Direccion Residencia']) }}
                                                </div>
                                            </div>

                                           
                                          </div>
                                      </div>


                                        <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('colaborador_phone_1', 'Telefono: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'colaborador_phone_1', 'placeholder' => 'Telefono']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('colaborador_celular', 'Celular: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_celular', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'colaborador_celular', 'placeholder' => 'Celular']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>


                                       <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('colaborador_c_emergency', 'Contacto de Emergencia: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_c_emergency', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'colaborador_c_emergency', 'placeholder' => 'Contacto de Emergencia']) }}
                                                </div>
                                            </div>

                                          </div>
                                      </div>


                                      <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('colaborador_c_phone_2', 'Telefono Emergencia: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_c_phone_2', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'colaborador_c_phone_2', 'placeholder' => 'Telefono Emergencia']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('colaborador_c_celular', 'Celular Emergencia: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('colaborador_c_celular', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'colaborador_c_celular', 'placeholder' => 'Celular Emergencia']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>

                                </div> 


                                <input type="button" name="previous" class="previous action-button-previous" value="Atras" /> <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Mascota</h2>

                                      <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('mascota_tipo', 'Tipo: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('mascota_tipo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'mascota_tipo', 'placeholder' => 'Tipo Mascota']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('mascota_nombre', 'Nombre: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('mascota_nombre', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'mascota_nombre', 'placeholder' => 'Nombre']) }}
                                                </div>
                                            </div>

                                           
                                          </div>
                                      </div>


                                        <div class="col-lg-12 ">
                                           
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                              {{ Form::label('mascota_raza', 'Raza: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('mascota_raza', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'mascota_raza', 'placeholder' => 'Raza']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('mascota_color', 'Color: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('mascota_color', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'mascota_color', 'placeholder' => 'Color']) }}
                                                </div>
                                            </div>
                                          </div>
                                      </div>

                                </div> 


                                <input type="button" name="previous" class="previous action-button-previous" value="Atras" /> <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>


                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Se ha Guardado con Exito !!</h5>

                                        </div>


                                    </div>

                                    <div class="row justify-content-center p-t-10">
                                     

                                      <a href="{{url('dashboard')}}"
                                       class="btn btn-md btn-inverse">Finalizar</a>
                                    </div>


                                </div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>