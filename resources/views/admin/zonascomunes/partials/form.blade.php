 <!-- Formulario Create -->
             
    <div class="row">
                 
      <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="row">
            <div class="col-lg-12 m-b-15">
             
              
                  <div class="box_img_profile ">
                    <div class="img_profile">
                    
                      
                        <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                     
                      <!--  <img class="rounded-circle" src="{{url('admin/images/user-card/img-round2.jpg')}}" alt="Image"> -->
                    </div>
                </div>
             
            </div>

            <div class="col-lg-12  m-b-15">
              <!--  {{ Form::file('file', null, ['class' => '']) }} -->
                <label for="file" class="uploafile btn btn-md btn-inverse">
                  <i class="fa fa-upload"></i>
                   </label>
                <input type="file" id="file" name="file" id="file" style="display: none">
            </div>
        </div>
      </div>


      <div class="col-lg-6 col-xs-12 product-detail" id="product-detail">
        <div class="row">
          <div>
            <div class="col-lg-12">
                                   
                  <h3 class="text-primary">Informacion de la Zona</h3>
                    
                    <span class="txt-muted d-inline-block"> </span>
                    
            </div>
                
            <div class="col-lg-12 p-t-20">
                    
                      <div class="form-group">
                       

                       <label>Nombre de la Zona* :</label>   
                          {{ Form::text('name', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'name', 'placeholder' => 'Nombre de la Zona']) }}
                      
                      </div>

            </div>




             <div class="col-lg-12 p-t-10">
                  
                <div class="form-group">
                    
                      <label>Descripcion* :</label>   

                    {{ Form::textarea('description', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 'placeholder' => 'Descripcion']) }}
                
                </div>

            </div>

            <div class="col-lg-12 p-t-10">                  
                  <div class="form-group">
                      
                       <label>Costo x hora de Alquiler* :</label>   
                      {{ Form::number('valorxhora', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'valorxhora', 'placeholder' => 'Valor']) }}
                  
                  </div>
            </div>

             <div class="col-lg-12 p-t-10">                  
                  <div class="form-group">
                    <label>Disponible* :</label>   
                      <div class="border-checkbox-section">
                        
                     
                        <div class="form-group row has-success">
                        
                            <div class="col-sm-10">
                              <div class="form-radio">
                                  <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                      <input type="radio" name="disponible" value="1" data-bv-field="member" checked>
                                        <i class="helper"></i>SI
                                    </label>
                                  </div>
                              
                                  <div class="radio radiofill radio-danger radio-inline">
                                    <label>
                                      <input type="radio" name="disponible" value="0" data-bv-field="member">
                                        <i class="helper"></i>NO
                                    </label>
                                  </div>
                              </div>
                                      <span class="messages"></span>
                               
                            </div>
                        </div>

                       
                                                                 
                    </div>
                  
                  </div>

            </div>

       
          </div>
      </div>
  </div>
</div>
<!--ROW Fila Principal -->
<hr>
          
            <hr>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-xs-12">
                   <h4 class="text-primary">Notas Adicionales</h4>
                    
                  <div class="row p-t-10">
                              
      
                      <div class="col-lg-12 p-t-20">
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                              {{ Form::text('notas', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'notas', 'placeholder' => 'Notas']) }}
                          </div>
                        </div>
                      </div>



                  </div>          
                </div>
            </div>


            <div class="row p-t-20">
               <div class="col-lg-12 col-sm-12 mob-product-btn">
                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">
                        <i class="icofont icofont-save f-16"></i><span class="m-l-10">GUARDAR</span>
                    </button>
                    <a href="{{route('zonascomunes.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Cancelar</a>
                    
                </div>
            </div>
      


      <input type="hidden" name="token" value="{{ csrf_token() }}">



       

@section('scripts')
  

   <script src="{{ asset('admin/js/validation.js') }}"></script>


@endsection