<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-10 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Formulario de Registro</strong></h2>
                <p>Datos Basicos del Residente</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                      
                   <form id="arrendatario" class="msform">
                      
                            <!-- progressbar -->

                         
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Datos del Residente</strong></li>
                                                             
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

                                                 
                                                  {{ Form::text('residente1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'residente1', 'placeholder' => 'Nombre completo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('Identificacion', 'Identificacion: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_1_cc', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'residente_1_cc', 'placeholder' => 'CC / NIT']) }}
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

                                                 
                                                  {{ Form::text('residente_2', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'residente_2', 'placeholder' => 'Nombre completo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                 {{ Form::label('Identificacion', 'Identificacion: *')}}

                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_2_cc', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'residente_2_cc', 'placeholder' => 'CC / NIT']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-lg-12 ">
                                           {{ Form::label('phone', 'Telefono: *')}}
                                          <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_2_phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'residente_2_phone_1', 'placeholder' => 'Telefono fijo']) }}
                                                </div>
                                            </div>

                                             <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">

                                                 
                                                  {{ Form::text('residente_2_celular_1', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'residente_2_celular_1', 'placeholder' => 'Celular']) }}
                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                </div> <input type="button"  name="next" class="next btn btn-md btn-primary " value="Continuar" />
                            </fieldset>
                            
                             
                              <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Felicidades haz terminado !!</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Haz click en en el botton Finalizar y Enviar !!</h5>

                                        </div>


                                    </div>

                                    <div class="row justify-content-center p-t-10">
                                     

                                      <input type="button" id="finalizar" name="finalizar" value="Finalizar y Enviar"  class="btn btn-md btn-primary">   
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