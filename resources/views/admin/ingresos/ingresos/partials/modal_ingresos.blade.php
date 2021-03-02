
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalUpdate">

    <div class="modal-dialog modal-md">
      <div class="modal-content">
  
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Factura</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          
  
  
        <div class="modal-body">
             
  
        <form id="dataForm" action="{{url('obligaciones-pagos-update')}}" method="POST">
               
            @csrf
            
               <div class="datamodal col-md-10">
                <h4>Estado del Documento:</h4>
                   <div class="row pt-20">
                 
                        <input type="hidden" name="document_id" value="" id="document_id">

                        <div class="col-md-6">  
                            <select class="form-control" name="status">
                                <option value="1">En Proceso</option> 
                                <option value="2">Pagada</option>
                                <option value="3">Anulada</option>
                            </select>
                        </div>
                    </div>      
    
  
                </div>  
  
  
      
  
            <div class="modal-footer">

                <button type="submit" class="btn btn-danger">Actualizar</button>


              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              
            </div>   
          
          </form>
  
  
        </div>
      </div>
    </div>
  </div>  
  
  