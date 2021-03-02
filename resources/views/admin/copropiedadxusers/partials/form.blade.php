
<div class="row">
    <div class="col-lg-8">
        <div class="form-group row {{ $errors->has('profile_id') ? ' has-error' : '' }}">
            <label class="col-md-3 col-sm-12 col-form-label">Usuario *</label>
                <div class="col-md-6 col-lx-5 col-sm-12" > 
	                <input type="hidden" id="idUser" name="user_id" value="">
	                    <input type="text" 
                            class="form-control form-txt-primary form-control-primary" 
                            name="username" id="search_profiles"
                            placeholder="Nombre / CC">                    
                            <!--  <select name="user_id" id="get_profiles" class="form-control form-txt-primary form-control-primary"
                            placeholder="--Seleccione--" required>
                              </select> -->
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-inverse waves-effect" id="user_search"><i class="fa fa-search"></i></button>
                </div>


        </div>

                     
    </div>
</div>

    <div class="row p-t-10 p-b-10" id="boxGenerarConsulta">
       

            <div class="col-sm-3"></div>
            <div class="col-sm">
                <button type="button" class="btn btn-inverse waves-effect" id="btnGenerarConsulta"><i class="fa fa-plus"></i> Generar Consulta</button>
            </div>
            <div class="col-sm"></div>

       
    </div>

    <div class="row b-t-20 p-t-30" id="boxlistcopopropiedades">
       <div class="col-lg-8">
            <div class="sub-title" id="boxlist">

            </div>
       </div>        
    </div>

    <div class="row" id="boxSearchCopropiedad">
        <div class="col-lg-8">
            <div class="form-group row">
                <label class="col-md-3 col-sm-12 col-form-label">Copropiedad *</label>
                    <div class="col-md-6 col-lx-5 col-sm-12" > 
                        <input type="hidden" id="idCopropiedad" name="copropiedad_id" value="">
                            
                        <input type="text" 
                                class="form-control form-txt-primary form-control-primary" 
                                name="copropiedad" id="search_copropiedades"
                                placeholder="Copropiedad">                    
                              
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-inverse waves-effect" id="btnCopropiedadSearch"><i class="fa fa-search"></i></button>
                    </div>


            </div>
        </div>
    </div>


    <div class="row" id="optionsGroup">
    
      
        <div class="col-sm-2">
        <button type="submit" class="btn btn-inverse waves-effect" id="addgroup"><i class="fa fa-save"></i> Actualizar</button>
        </div>
        <div class="col-sm-2">
            <a href="{{route('copropiedadxusers.index')}}" class="btn btn-inverse waves-effect" id="addgroup"><i class="fa fa-search"></i>Buscar</a>
        </div>

        <div class="col-sm-3">
            <button type="button" class="btn btn-inverse waves-effect" id="btndeletegroup"><i class="fa fa-times"></i> Eliminar Copropiedad</button>
        </div>
    </div>


    <input type="hidden" name="token" value="{{ csrf_token() }}">

     

@section('scripts')

     
    <script src="{{url('admin/js/querys/copropiedadxusers.js')}}"></script>
    <script src="{{url('admin/js/querys/loadcopropiedadxusers.js')}}"></script>
    <!-- The main application script -->

    <script src="{{ asset('admin/js/validation.js') }}"></script>

 @endsection