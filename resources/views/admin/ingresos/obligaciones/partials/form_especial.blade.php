 <!-- Formulario Create -->
             
    <div class="row">
                 
    <div class="col-lg-12 col-md-12 col-xs-12">
       
          <div class="inmueble">

            <div class="row">
              <div class="col-lg-8 col-md-8">
                                     
                    <h3 class="text-primary">Crear Obligacion Por Apartamento</h3>
                      
            
                      
              </div>

              <div class="col-lg-6 col-md-6">
                                     
                   <!--  <h3 class="text-primary">Estado</h3> -->
                      
                     
                      
              </div>
            </div>
        
        <div class="row">  
            

             <div class="col-lg-12 p-t-10">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Nombre / Codigo -Inmueble </label>
                    <div class="col-sm-7">
                        
                        {!! Form::select('inmueble_id',
                         [ null => '-- Selecciona ---']+ $inmuebles,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'required' => 'required']) !!}
                    </div>
              </div>
          
            </div>
            

            <div class="col-lg-12  ">
                  
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Año Fiscal :</label>
                      <div class="col-sm-7">
                              {!! Form::select('year_id',
                         [ null => '-- Selecciona ---']+ $years,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'required' => 'required']) !!}
                      </div>
                </div>
          

            </div>


       

            
            <div class="col-lg-12 ">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Fecha Limite de Pago</label>
                    <div class="col-sm-5">
                            {{ Form::date('daysinrecargo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'required' => 'required' ]) }}
                    </div>
              </div>
          
            </div>

            <div class="col-lg-12 p-t-20">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Conceptos Financiero 1:</label>

                    <div class="col-sm-5">
                      

                        {!! Form::select('concepto_id[]',
                         [ null => '-- Selecciona ---']+ $cfinancieros,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'required' => 'required']) !!}

                    </div>
     
                  
                </div>


                 <div class="form-group row">
               
                   
                        
                    <label class="col-sm-5 col-form-label">Valor Concepto * :</label>
                

                     <div class="col-sm-5">
                      

                         {{ Form::text('valor[]', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => '$', 'required' => 'required']) }}

                        

                    </div>
                   

                     
                  
                </div>
              </div>
          

               <div  id="boxconcept" class="col-md-12">
                  
               </div>
                    
              
              <div class="row p-t-20">
                  <div class="col-md-6">
                     <div class="col-sm-3 col-md-3">
                      
                       <button type="button" class="btn btn-inverse waves-effect" id="newconcept" ><i class="fa fa-plus"></i>Concepto Financiero</button>
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
  


   <script src="{{ asset('admin/js/querys/generarobligaciones.js') }}"></script>

@endsection

        
  
