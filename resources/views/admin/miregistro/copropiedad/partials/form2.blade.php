 <!-- Formulario Create -->
            
<div class="row">
    
  <div class="col-lg-6 col-xs-12 product-detail" id="product-detail">
    <div class="col-sm-12 col-lg-12">
      <h3 class="text-primary">Datos de Identificación</h3>
        <span class="txt-muted d-inline-block">Informacion Basica de la Copropiedad </span>
    </div>
                
    <div class="col-sm-12 col-lg-12 p-t-30">
      <div class="row">
         <label class="col-sm-5 col-form-label">Nombre  de la Copropiedad *</label>

        <div class="col-sm-7">
      
          {{ Form::text('name', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre de la Copropiedad', 'required' => 'required']) }}


        </div>
      </div>
    </div>

    <div class="col-sm-12 col-lg-12  p-t-10 ">
      <div class="row">
         <label class="col-sm-5 col-form-label">Direccion *</label>

        <div class="col-sm-7">
          {{ Form::text('address', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'address', 'placeholder' => 'Direccion', 'required' => 'required']) }}
        </div>
      </div>
    </div>
    
    <div class="col-lg-12 p-t-10 ">
      <div class="row">
         <label class="col-sm-5 col-form-label">Pais *</label>

        <div class="col-md-7 col-lg-7 col-sm-7">
          {{ Form::select('country', [
              'colombia' => 'COLOMBIA', 
               ], null,
            ['class' => 'form-control form-txt-primary form-control-primary', 
            'id' => 'country'
            ]) }}
                 
        </div>
      </div>
    </div>

    
    <div class="col-lg-12 p-t-10">
      <div class="row">
        <label class="col-sm-5 col-form-label">Departamento *</label>
          <div class="col-md-7 col-lg-7 col-sm-7">
            {{ Form::text('department', null, [
              'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary', 
              'id' => 'department',
              'autocomplete'=>'off',  
              'data-provide' =>'typeahead', 
              'required' => 'required',
              'placeholder' => 'Departamento'])}}
          </div>
        </div>
      </div>
       
      <div class="col-lg-12 p-t-10">
           <div class="row">
             <label class="col-sm-5 col-form-label">Ciudad *</label>

                <div class="col-md-7 col-lg-7 col-xs-12">
                  {{ Form::text('city', null, [
                 'class' => 'form-control bs-autocomplete form-txt-primary form-control-primary',
                 'id' => 'city',
                 'autocomplete'=>'off', 
                 'data-provide' =>'typeahead',
                 'required' => 'required',
                 'placeholder' => 'Ciudad'])}}

                </div>
          </div>
      </div>

       <div class="col-lg-12 p-t-10">
          <div class="row">
             <label class="col-sm-5 col-form-label">Localidad *</label>
               <div class="col-md-7 col-lg-7 col-xs-12">
                  {{ Form::text('location', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'location', 'placeholder' => 'Localidad']) }}
              </div>
          </div>
        </div>
  
  </div>   


  <!-- IMG -->
  
  <div class="col-md-6">
      <div class="box_img_profile ">
        <div class="img_profile">
            @if(!$copropiedad->file)
            
              <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">
              
              <div class="p-t-5">
                  <a href="{{url('copropiedad/edit/upload/file', $copropiedad->id)}}" class="btn btn-md btn-warning"><i class="fa fa-edit"></i>Imagen</a>
              </div>
            
            @else
            <img class="img img-fluid" src="{{ $copropiedad->file }}" alt="Image">

             <div class="p-t-5">
                  <a href="{{url('copropiedad/edit/upload/file', $copropiedad->id)}}" class="btn btn-md btn-warning"><i class="fa fa-edit"></i>Imagen</a>
              </div>

            @endif
            <!--  <img class="rounded-circle" src="{{url('admin/images/user-card/img-round2.jpg')}}" alt="Image"> -->
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
                        <label class="col-sm-5 col-form-label">Tipo de Copropiedad *</label>
                        <div class="col-sm-7">
                           <!--  {{ Form::text('id_tipo_copropiedad', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'id_tipo_copropiedad', 'placeholder' => '--Seleccione--']) }} -->

                           {!! Form::select('tipocopropiedad_id',
                               [ null => '--Seleccione ---']+ $tipocp,
                                null, 
                                ['class' => 'form-control form-txt-primary form-control-primary', 
                                'required' => 'required',
                                'id' => 'tipocopropiedad_id']) !!}


                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Area de zona comun</label>
                        <div class="col-sm-5">
                           {{ Form::number('area_comun', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'area1', 'placeholder' => 'Zona Comun', 'id'=>'area_comun']) }}
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Area de zona privada</label>
                        <div class="col-sm-5">
                           {{ Form::number('area_privada', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'area_privada', 'placeholder' => 'Zona privada']) }}
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
                            '2' => 'Empresa Administradora',
                            ], null,
                            ['class' => 'form-control form-txt-primary form-control-primary', 
                            'id' => 'tipo_identificacion', 
                            'placeholder' => '--- Seleccione-- ', 'required' => 'required']) }}
                          </div>
                        </div>
                      </div>
                  
                  <div class="col-lg-12">
                     <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
                          <label class="col-sm-5 col-form-label">Administrador Delegado *</label>
                          

                           <div class="col-md-4 col-lx-5 col-sm-12" > 

                            @if($user)
                            <input type="hidden" id="idUser" name="user_id" value="{{ $user->id }}">

                            <input type="text" 
                            class="form-control form-txt-primary form-control-primary" 
                            name="username" id="search_profiles" 
                            value="{{ $user->name }}" 
                            placeholder="Nombre / CC">                    
                            
                            @else
                            <input type="hidden" id="idUser" name="user_id" value="">

                            <input type="text" 
                            class="form-control form-txt-primary form-control-primary" 
                            name="username" id="search_profiles" 
                            value="" 
                            placeholder="Nombre / CC">     
    
                              @endif

                          </div>


                          <div class="col-md-1">
                          
                            <button type="button" class="btn btn-inverse waves-effect" id="user_search"><i class="fa fa-search"></i></button>
                          </div>


                          <div class="col-md-2">
                          
                            <button type="button" class="btn btn-inverse waves-effect" id="newuser"><i class="fa fa-plus"></i><i class="fa fa-user"></i></button>
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

   
  
    <script src="{{url('admin/js/file_uploader/demo.js')}}"></script>

    <!-- The main application script -->

    <script src="{{ asset('admin/js/validation.js') }}"></script>

   <script src="{{ asset('admin/js/querys/typeahead.js') }}"></script>
   <script src="{{ asset('admin/js/querys/location.js') }}"></script>
   <script src="{{ asset('admin/js/querys/copropiedad.js') }}"></script>
  
 
@endsection