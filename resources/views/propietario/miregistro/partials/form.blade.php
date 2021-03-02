<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
       
        <div class="col-md-12 col-sm-9 col-md-7 col-lg-8 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Formulario de Registro</strong></h2>
                <p>Datos Basicos del Propietario</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                      
                    {!! Form::model($user, ['url' => ['save/propietario', $user->id], 
                      'method' => 'PUT', 
                      'id' => 'msform',
                      'class' => 'msform'

                      ]) !!}
                      
                            <!-- progressbar -->

                         
                            <ul id="progressbar2">
                                <li class="active" id="account"><strong>Mi Registro</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                                                              
                            </ul> <!-- fieldsets -->
                        
                 
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informacion Basica</h2>
                                      
                                    
                                    <div class="row">
                                      <div class="col-lg-6 col-sm-12 p-t-10">
                                        <div class="form-group">
                                            {{ Form::label('tipo_identificacion', 'Tipo de Identificacion: *')}}
                                              {{ Form::select('tipo_identificacion', [

                                                '1' => 'Nit - Persona Natural', 
                                                '2' => 'Nit - Persona Juridica',
                                                '3' => 'CC  - Persona Natural' ], null,
                                              ['class' => 'form-control form-txt-primary form-control-primary', 
                                              'id' => 'tipo_identificacion', 
                                              'placeholder' => '--- Seleccione-- ']) }}
                                        </div>
                                      </div>

                                      <div class="col-lg-6 sol-sm-12 p-t-10">
                            
                                          <div class="form-group">
                                            {{ Form::label('Identificacion', 'Identificacion: *')}}
                                           
                                            {{ Form::text('nit', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'nit', 'placeholder' => 'Cedula / Nit']) }}
                                          </div>
                                                                
                                      </div>
                                    </div>

                                <div class="row">
                                  <div class="col-lg-8 p-t-10 ">
                                    <div class="form-group">
                                      {{ Form::label('name', 'Nombre Completo / Razon Social: *')}}
                                            {{ Form::text('name', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre Completo']) }}
                                    </div>
                                  </div>
                                </div>

                                   
                                  <div class="row">

                                    <div class="col-md-6 col-lg-6 col-xs-12">
                                       {{ Form::label('phone', 'Telefono: *')}}
                                      <div class="form-group">
                                        {{ Form::text('phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Telefono fijo']) }}
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-lg-6 col-xs-12">
                                      {{ Form::label('phone', 'Celular: *')}}
                                      <div class="form-group">
                                        {{ Form::text('phone_2', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'phone_2', 'placeholder' => 'Celular']) }}
                                      </div>
                                    </div>
                                  </div>
                                
                                <div class="row">
                                  <div class="col-lg-8 p-t-10">
                                    {{ Form::label('email', 'Email: *')}}
                                    <div class="form-group">
                                      {{ Form::text('email', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'email', 'placeholder' => 'Correo Electronico']) }}
                                    </div>
                                  </div>                                  
                                </div>
                               

                                  <hr>
                              
                              <div class="row">
                                <div class="col-lg-12 p-t-10">
                                  {{ Form::label('politica', 'Politica Tratamiento de Datos: *')}}
                                  <div class="form-group">
                                    <p class="aviso_autorizacion">AUTORIZACIÓN. El abajo firmante, en su propio nombre o en nombre de la entidad que representa, declara que la información suministrada es verídica y da su consentimiento expreso e irrevocable a (LA ENTIDAD), o a quien en el futuro haga sus veces como titular del crédito o servicio solicitado, para:  a) Consultar, en cualquier tiempo, en Centrales de Riesgo o en cualquier otra base de datos manejada por un operador de información financiera y crediticia, toda la información relevante para conocer su desempeño como deudor, su capacidad de pago, la viabilidad para entablar o mantener una relación contractual, o para cualquier otra finalidad, incluyendo sin limitarse la realización de campañas de mercadeo, ofrecimiento de productos y publicidad en general.  b) Reportar a las Centrales de Riesgo o a cualquier otra base de datos manejada por un operador datos, tratados o sin tratar, sobre el cumplimiento o incumplimiento de sus obligaciones crediticias, sus deberes legales de contenido patrimonial, sus datos de ubicación y contacto (número de teléfono fijo, número de teléfono celular, dirección del domicilio, dirección laboral y correo electrónico), sus solicitudes de crédito así como otros atinentes a sus relaciones comerciales, financieras y en general socioeconómicas que haya entregado o que consten en registros públicos, bases de datos públicas o documentos públicos.  2. La autorización anterior no impedirá al abajo firmante o su representada, ejercer el derecho a corroborar en cualquier tiempo en LA ENTIDAD, en la Central de Riesgo pertinente o en la central de información de riesgo a la cual se hayan suministrado los datos, que la información suministrada es veraz, completa, exacta y actualizada, y en caso de que no lo sea, a que se deje constancia de su desacuerdo, a exigir la rectificación y a ser informado sobre las correcciones efectuadas.  FIRMA  Nombre: Hereda este dato de lo que registre  Cédula de Ciudadanía: Hereda este dato de lo que registre Fecha: Se genera automaticamante con base en el check de aprobación </p>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-2">
                                {{Form::label('autorizacion', 'Autorizacion: ')}}
                              </div>
                              <div class="col-md-2">
                                 {{ Form::select('politica_datos', 
                                 [
                                 ''=> '-- --',                               
                                 'SI' => '--SI--'], null, [
                                 'class' => 'form-control form-txt-primary 
                                 form-control-primary',
                                 'id' => 'politica_datos'] ) }}
                              </div>                                     
                            </div>
                      
                        </div> 

                                <input type="button"  name="next" class="next btn btn-md btn-primary " value="Continuar" />
                        </fieldset>
                          
                           
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Felicidades haz terminado !!</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="{{url('admin/icon/beehive/icons-ok.png')}}" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Haz click en en el botton Finalizar y Enviar !!</h5>

                                        </div>


                                    </div>
                                  </div>


                                      <input type="button" name="previous" class="previous btn btn-md btn-inverse" value="Atras" />

                                      <input type="button" id="finalizar" name="finalizar" value="Finalizar y Enviar"  class="btn btn-md btn-primary">     

                                </div>


                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>