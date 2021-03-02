

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalreserva">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Solicitar Reserva 
          </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        


      <div class="modal-body">
           

        <form id="formreserva" action="#">
            
            <div class="col-md-12">
              <input type="hidden" id="txtFecha"    name="txtFecha" value="">
              <input type="hidden" id="idevent"     name="idevent" value="">
              <input type="hidden" id="zonacomun_id" name="zonacomun_id" value="{{$z->id}}">
            </div>
          <div class="col-lg-12">
             <div class="form-group row ">
                  <label class="col-sm-3 col-form-label">Nombre del Evento:</label>
                  
                   <div class="col-md-6 col-lx-6 col-sm-12">
                       {{ Form::text('txtTitulo', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'txtTitulo', 'placeholder' => 'Nombre del Evento',
                       'required' => 'requiered']) }}
                  </div>

                  
              </div>                     
          </div>

          <div class="col-lg-12">
             <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Hora de Inicio - 24h: </label>
                  
                   <div class="col-md-3 col-lx-3 col-sm-12 input-group date" id="datetimepicker9">
                       {{ Form::time('txtHorastart', 
                        null, 
                        ['class' => 'form-control form-txt-primary form-control-primary', 
                        'id' => 'txtHorastart', 
                        'placeholder' => 'Hora', 
                        'required' => 'requiered']) }}
                  </div>                  
              </div>                     
          </div>

           <div class="col-lg-12">
             <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Hora que Finaliza - 24h: </label>
                  
                   <div class="col-md-3 col-lx-3 col-sm-12 input-group date" id="datetimepicker9">
                       {{ Form::time('txtHoraend', 
                        null, 
                        ['class' => 'form-control form-txt-primary form-control-primary', 
                        'id' => 'txtHoraend', 
                        'placeholder' => 'Hora', 
                        'required' => 'requiered']) }}
                  </div>                  
              </div>                     
          </div>

            <div class="col-lg-12">
             <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Descripcion:</label>
                  
                   <div class="col-md-6 col-lx-6 col-sm-12">
                       {{ Form::textarea('description', null, ['class' => 'form-control form-txt-primary form-control-primary', 'id' => 'description', 
                       'placeholder' => 'Descripcion',
                       'rows' => '2',
                       'required' => 'requiered']) }}
                  </div>                  
              </div> 
            </div>      
      
            
        </div>  


    

          <div class="modal-footer">
            <button type="submit" id="btnAgregar" class="btn btn-primary">Agregar</button>
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>            
          </div>   
        
        </form>


    </div>
  </div>
</div>



