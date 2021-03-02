 <!-- Formulario Create -->
             
    <div class="row">
                 
    <div class="col-lg-12 col-md-12 col-xs-12">
       
          <div class="inmueble">

            <div class="row">
              <div class="col-lg-8 col-md-8">
                                     
                    <h3 class="text-primary">Configuracion Factura</h3>
                      
            
                      
              </div>

              <div class="col-lg-6 col-md-6">
                                     
                   <!--  <h3 class="text-primary">Estado</h3> -->
                      
                     
                      
              </div>
            </div>
        
        <div class="row">  

            

            <div class="col-lg-12 p-t-10 ">
                  
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
                    <label class="col-sm-5 col-form-label">Periodo / Mes:</label>
                      <div class="col-sm-7">
                              {!! Form::select('month_id',
                         [ null => '-- Selecciona ---']+ $months,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'required' => 'required']) !!}
                      </div>
                </div>
          

            </div>

            <div class="col-lg-12 ">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Fecha Limite de Pago</label>
                    <div class="col-sm-7">
                            {{ Form::date('daysinrecargo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'required' => 'required' ]) }}
                    </div>
              </div>
          
            </div>
{{-- 
            <div class="col-lg-12 ">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Fecha Limite Con Recargo</label>
                    <div class="col-sm-7">
                            {{ Form::date('dayrecargo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => 'Descripcion', 'required' => 'required']) }}
                    </div>
              </div>
          
            </div> --}}

          

              <div class="col-lg-12 p-t-20">
                <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Conceptos Financiero 1:</label>

                    <div class="col-sm-5">
                      

                        {!! Form::select('concepto_id[]',
                         [ null => '-- Selecciona ---']+ $cfinancieros,
                          null, 
                          ['class' => 'form-control form-txt-primary form-control-primary', 'required' => 'required']) !!}

                    </div>

                   {{--  <div class="col-sm-2 col-md-2">
                        
                         <button type="button" class="btn btn-inverse waves-effect" id="newconcept" ><i class="fa fa-plus"></i>Concepto Financiero</button>
                    </div>     --}}      
                  
                </div>


                 <div class="form-group row">
               
                    <div class="col-sm-5">
                        

                    </div>

                     <div class="col-sm-5">
                      

                         {{ Form::text('valor[]', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => '$', 'required' => 'required']) }}

                        

                    </div>
                   

                     
                  
                </div>
              </div>


    

               <div class="col-lg-12 ">
                  <div class="form-group row" id="boxconcept">
                        
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
  


   <script src="{{ asset('admin/js/querys/conceptoxfactura.js') }}"></script>

@endsection

        
  
