 <!-- Formulario Create -->
             
    <div class="row">
                 
    <div class="col-lg-10 col-md-12 col-xs-12">
       
          <div class="inmueble">

            <div class="row">
              <div class="col-lg-6 col-md-6">
                                     
                    <h3 class="text-primary">Concepto Financiero</h3>
                      
                   
                      
              </div>

              <div class="col-lg-6 col-md-6">
                                     
                   <!--  <h3 class="text-primary">Estado</h3> -->
                      
                     
                      
              </div>
            </div>
        
        <div class="row">  

            <div class="col-lg-12 p-t-10 ">
                  
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Nombre del concepto</label>
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
              
           


        
  
