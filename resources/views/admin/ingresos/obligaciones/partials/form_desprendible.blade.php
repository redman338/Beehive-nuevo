 <!-- Formulario Create -->
             
    <div class="row">
                 
      <div class="m-5 col-lg-12 col-md-12 col-xs-12">
       
            <div class="row">
              <div class="col-lg-12 col-md-12">
                                     
                    <h3 class="text-primary"><i class="fa fa-search"></i> Desprendible por Apartamento</h3>
                 
              </div>
            </div>
        
          <div class="row p-t-20"> 

              <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Numero de Desprendible:  </label>
                      <div class="col-sm-12">
                          
                          {!! Form::text('numero_doc',
                            null, 
                            ['class' => 'form-control form-txt-primary form-control-primary',
                            'placeholder' => 'Numero de Documento', 'id'=>'numero_doc']) !!}
                      </div>
                </div>          
              </div>

            <div class="col-md-6">
               <div class="form-group row">
                <label class="col-sm-12 col-form-label">Nombre / Codigo -Inmueble </label>
                  <div class="col-sm-12">
                      
                      {!! Form::select('inmueble_id',
                       [ null => '-- Selecciona ---']+ $inmuebles,
                        null, 
                        ['class' => 'form-control form-txt-primary form-control-primary', 'id'=>'inmueble_id']) !!}
                  </div>
              </div>
            </div>           
          </div>
            
          
          <div class="row p-t-20">
            <div class="col-lg-6">
              <div class="form-group row">
                        <label class="col-sm-12 col-form-label">Año Fiscal :</label>
                          <div class="col-sm-12">
                                  {!! Form::select('year_id',
                             [ null => '-- Selecciona ---']+ $years,
                              null, 
                              ['class' => 'form-control form-txt-primary form-control-primary','id'=>'year_id']) !!}
                          </div>
               </div>
            </div>

              <div class="col-lg-6 ">
                  
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Periodo / Mes:</label>
                      <div class="col-sm-12">
                              {!! Form::select('month_id',
                         [ null => '-- Selecciona ---']+ $months,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'id'=>'month_id']) !!}
                      </div>
                </div>
              </div>

          </div>


              
                    
              
              <div class="row p-t-20">
                  <div class="col-md-6">
                     <div class="col-sm-3 col-md-3">
                      
                       <button type="submit" class="btn btn-inverse waves-effect" id="getdesprendible" ><i class="fa fa-search"></i>Buscar Desprendible</button>
                      </div>  
                  </div>
              </div>
                
          </div>
      </div>
  </div>
</div>
<!--ROW Fila Principal -->
<hr>
              
           
<input type="hidden" name="token" value="{{ csrf_token() }}">

@section('scripts')
  
  <script src="{{ asset('admin/js/querys/getdesprendible.js') }}"></script>

@endsection

        
  
