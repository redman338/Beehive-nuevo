 
 <!-- Formulario Create -->
  <div class="row">
    <div class="col-lg-5 col-md-5 col-xs-12">
      <div class="row">
        <div class="col-lg-12 m-b-15">
         
          
              <div class="box_img_profile ">
                <div class="img_profile">
                  @if(!$profile->file)
                  
                    <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                  @else
                  <img class="img img-fluid" src="{{ $profile->file }}" alt="Image">

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

   <div class="col-lg-7 col-md-7 col-xs-12 " >
    <div class="row">
      <div class="form_userdetail">
        <div class="col-lg-12">
          <h3 class="text-primary">Datos Generales</h3>
            <span class="txt-muted d-inline-block">Informacion Basica del Usuario</span>
        </div>

         <div class="col-lg-12 p-t-20">
                            
          <div class="form-group">
            {{ Form::label('tipo_identificacion', 'Tipo de Identificacion: *')}}
            
            {{ Form::select('tipo_identificacion', [

              '1' => 'Nit - Persona Natural', 
              '2' => 'Nit - Persona Juridica',
              '3' => 'CC  - Persona Natural' ], $profile->tipo_identificacion,
            
            ['class' => 'form-control form-txt-primary form-control-primary', 
            'id' => 'tipo_identificacion', 
            'placeholder' => '--- Seleccione-- ']) }}

            
          </div>
                                
        </div>

        <div class="col-lg-12 p-t-10">
                            
          <div class="form-group">
            {{ Form::label('Identificacion', 'Identificacion: *')}}
           
            {{ Form::text('nit', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Cedula / Nit']) }}
          </div>
                                
        </div>
        
      
   
          <div class="col-lg-12 p-t-10">    

              <div class="form-group">
              
              {{ Form::label('name', 'Nombre Completo / Razon Social: *')}}
                {{ Form::text('name', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre Completo']) }}
              </div>
                                
          </div>
           
          
      

        <div class="col-lg-12 ">
           {{ Form::label('phone', 'Telefono: *')}}
          <div class="row">
            
            <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="form-group">

                 
                  {{ Form::text('phone_1', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Telefono fijo']) }}
                </div>
            </div>

             <div class="col-md-6 col-lg-6 col-xs-12">
                <div class="form-group">

                 
                  {{ Form::text('phone_2', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Celular']) }}
                </div>
            </div>
          </div>
        </div>



        <div class="col-lg-12 ">
          <div class="form-group">
            {{ Form::text('address', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Direccion']) }}
          </div>
        </div>
        
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xs-12">
                {{ Form::text('department', null, [
                'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary', 
                'id' => 'department',
                'autocomplete'=>'off',  
                'data-provide' =>'typeahead', 
                'placeholder' => 'Departamento'])}}

             </div>


          <div class="col-md-6 col-lg-6 col-xs-12">
                 {{ Form::text('city', null, [
                 'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary',
                 'id' => 'city',
                 'autocomplete'=>'off', 
                 'data-provide' =>'typeahead',
                 'placeholder' => 'Ciudad'])}}
          </div>
        </div>
                                    
      </div>
     
        <div class="col-lg-12 p-t-10">
           <div class="form-group">
              {{ Form::text('email', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Correo Electronico']) }}
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--ROW Fila Principal -->
  
  <hr>


    <div class="form2">
        <div class="row">
          <div class="col-md-8 col-lg-8 col-xs-12">
             <h4 class="text-primary">Detalles de la Empresa</h4>
            
            <div class="row">
              <div class="col-lg-12 p-t-20">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Representante Legal: </label>
                  <div class="col-sm-7">
                      {{ Form::text('name_legal', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name_legal', 'placeholder' => 'Nombre Representante Legal']) }}
                  </div>
                </div>
              </div>
              
            
              <div class="col-lg-12">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Persona de Contacto: *</label>
                  <div class="col-sm-7">
                     {{ Form::text('contacto', null, ['class' => 'form-control form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Contacto']) }}
                  </div>
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
  <script src="{{ asset('admin/js/querys/editclient.js') }}"></script>


@endsection