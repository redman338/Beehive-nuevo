 <!-- Formulario Create -->
             
    <div class="row">
                 
    <div class="col-lg-10 col-md-12 col-xs-12">
       
          <div class="inmueble">

            <div class="row">
              <div class="col-lg-6 col-md-6">
                                     
                    <h3 class="text-primary">Datos del Bloque</h3>
                      
                      <span class="txt-muted d-inline-block">Informacion Basica </span>
                      
              </div>

              <div class="col-lg-6 col-md-6">
                                     
                   <!--  <h3 class="text-primary">Estado</h3> -->
                      
                     
                      
              </div>
            </div>
        
        <div class="row">       
            <div class="col-lg-12 p-t-10">
                  
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Nombre / Codigo</label>
                      <div class="col-sm-7">
                              {{ Form::text('name', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre / Codigo', 'required'=>'required']) }}
                      </div>
                </div>
          

            </div>

            <div class="col-lg-12 ">
              
              <div class="form-group row">
                  <label class="col-sm-5 col-form-label">Descripción</label>
                    <div class="col-sm-7">
                            {{ Form::text('description', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => 'Descripcion']) }}
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
                   <h4 class="text-primary">Copropiedad</h4>
                   <!--  <span class="txt-muted d-inline-block">Informacion General </span> -->
                    
                  <div class="row p-t-10">
       
                    <div class="col-lg-12">
                      <div class="form-group row">
                        <label class="col-sm-5 col-form-label">Copropiedad</label>
                        <div class="col-sm-7">
                           {!! Form::select('copropiedad_id',
                                 [ null => '-- Selecciona ---']+ $copropiedades,
                                  null, 
                                  ['class' => 'form-control form-txt-primary form-control-primary']) !!}
                        </div>
                      </div>
                    </div>


              

                  </div>

                </div>
              </div> 
            <hr>

         


        
  
