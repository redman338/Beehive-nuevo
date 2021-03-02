 <!-- Formulario Create -->
                 
  <div class="row">
    <div class="col-lg-6 col-md-6 col-xs-12">
      <div class="row">
        <div class="col-lg-12 m-b-15">
             
              
              <div class="box_img_profile ">
                <div class="img_profile">
                  @if(!$copropiedad->file)
                  
                    <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                  @else
                  <img class="img img-fluid" src="{{ $copropiedad->file }}" alt="Image">

                  @endif
                  <!--  <img class="rounded-circle" src="{{url('admin/images/user-card/img-round2.jpg')}}" alt="Image"> -->
                </div>
            </div>
             
        </div>

            <div class="col-lg-12  m-b-15">
               {{ Form::file('file', null, ['class' => '']) }}
            </div>
        </div>
      </div>
                          
                          <!--  -->


    <div class="col-lg-6 col-xs-12 product-detail" id="product-detail">
        <div class="row">
          <div>
            <div class="col-lg-12">
                                   
                  <h3 class="text-primary">Datos de Identificación</h3>
                    
                    <span class="txt-muted d-inline-block">Informacion Basica de la Copropiedad </span>
                    
            </div>
                
            <div class="col-lg-12 p-t-10">
                  
                      <div class="form-group">
                          
                          {{ Form::text('name', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre del nuevo cliente']) }}
                      
                      </div>

            </div>

            <div class="col-lg-12 ">
              
                  <div class="form-group">
                     
                      {{ Form::text('address', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'address', 'placeholder' => 'Direccion']) }}
                  

                  </div>
          
            </div>
            <div class="col-lg-12 ">

              <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12">
                    

                      {{ Form::select('country', [

                        'colombia' => 'Colombia', 
                         ], null,
                      ['class' => 'form-control form-txt-primary form-control-primary', 
                      'id' => 'country', 
                      ]) }}
                 
                </div>


                <div class="col-md-6 col-lg-6 col-xs-12">
                  {{ Form::text('department', null, [
                    'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary', 
                    'id' => 'department',
                    'autocomplete'=>'off',  
                    'data-provide' =>'typeahead', 
                    'placeholder' => 'Departamento'])}}
                </div>
              </div>
              
            </div>
            <div class="col-lg-12 p-t-10">
                 <div class="row">
                      <div class="col-md-6 col-lg-6 col-xs-12">
                        {{ Form::text('city', null, [
                       'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary',
                       'id' => 'city',
                       'autocomplete'=>'off', 
                       'data-provide' =>'typeahead',
                       'placeholder' => 'Ciudad'])}}

                      </div>
                     <div class="col-md-6 col-lg-6 col-xs-12">
                        {{ Form::text('location', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'location', 'placeholder' => 'Localidad']) }}
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!--ROW Fila Principal -->
<hr>
              
              <div class="row">
                <div class="col-md-8 col-lg-8 col-xs-12">
                   <h4 class="text-primary">Detalles de la Copropiedad</h4>
                   <!--  <span class="txt-muted d-inline-block">Informacion General </span> -->
                    
                  <div class="row p-t-10">
                    <div class="col-lg-12">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Tipo de Copropiedad</label>
                        <div class="col-sm-7">
                           <!--  {{ Form::text('id_tipo_copropiedad', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'id_tipo_copropiedad', 'placeholder' => '--Seleccione--']) }} -->

                           {!! Form::select('tipocopropiedad_id',
                               [ null => '--Seleccione ---']+ $tipocp,
                                null, 
                                ['class' => 'form-control form-txt-primary form-control-primary']) !!}


                        </div>
                      </div>
                    </div>

                 
                    <div class="col-lg-12">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Telefono</label>
                        <div class="col-sm-7">
                           {{ Form::text('phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'phone_1', 'placeholder' => 'Telefono']) }}
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div> 
            <hr>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-xs-12">
                   <h4 class="text-primary">Detalles de Administración</h4>
                    
                  <div class="row p-t-10">
                      <div class="col-lg-12">
                        <div class="form-group row">
                          <label class="col-sm-5 col-form-label">Tipo de Administracion **</label>
                          <div class="col-sm-7">
                     
                          {{ Form::select('tipoadministracion_id', [

                            '1' => 'Persona Natural', 
                            '2' => 'Empresa Administradora'], 
                            $copropiedad->tipoadministracion_id,
                            
                            ['class' => 'form-control form-txt-primary form-control-primary', 
                            'id' => 'tipo_identificacion', 
                            'placeholder' => '--- Seleccione-- ']) }}

                            
                          </div>
                        </div>
                      </div>
                  
                <div class="col-lg-12">
                     <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                          <label class="col-sm-5 col-form-label">Administrador Delegado *</label>
                          
                        <div class="col-sm-7">
                          {!! Form::select('profile_id',
                               [ null => '--Seleccione ---']+ $profiles,
                                null, 
                                ['class' => 'form-control form-txt-primary form-control-primary']) !!}
                        </div>
                          
                      </div>

                     
                  </div>

                   
                      <div class="col-lg-12 p-t-20">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                              {{ Form::text('description', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => 'Notas']) }}
                          </div>
                        </div>
                      </div>



                  </div>          
                </div>
            </div>


      


<input type="hidden" name="token" value="{{ csrf_token() }}">



       

@section('scripts')
  

   <script src="{{ asset('admin/js/querys/typeahead.js') }}"></script>
   <script src="{{ asset('admin/js/querys/location.js') }}"></script>
 <!--   <script src="{{ asset('admin/js/querys/copropiedad.js') }}"></script> -->

@endsection