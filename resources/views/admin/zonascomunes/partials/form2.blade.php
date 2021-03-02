 <!-- Formulario Create -->
             
    <div class="row">
                 
      <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="row">
            <div class="col-lg-12 m-b-15">
             
              
                  <div class="box_img_profile ">
                    <div class="img_profile">
                    
                      @if(!$zonacomun->file)
                  
                            <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                          @else

                          <img class="img img-fluid" src="{{ $zonacomun->file }}" alt="Image">

                          @endif
                     
                     
                    </div>
                </div>
             
            </div>

            <div class="col-lg-12  m-b-15">
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
                                   
                  <h3 class="text-primary">Informacion de la Zona Comun</h3>
                    
                  
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
                        
                     
                        <div class="border-checkbox-group border-checkbox-group-primary">
                          <input class="border-checkbox" type="checkbox" id="checkbox1" name="disponible" value="1">
                             <label class="border-checkbox-label" for="checkbox1">Si</label>
                        </div>
                        
                        <div class="border-checkbox-group border-checkbox-group-danger">
                            <input class="border-checkbox" type="checkbox" id="checkbox2" name="disponible" value="0">
                            <label class="border-checkbox-label" for="checkbox2">No</label>
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