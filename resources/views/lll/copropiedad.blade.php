@extends('layouts.copropiedad')

@section('content')

<div class="main-body">
  <div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                  <h4>Copropiedad</h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
             	
            </div>
        </div>
        
       
      </div>  
    </div>

    <!-- Page-body start -->
      <div class="page-body">
        <div class="row">

          <div class="col-sm-12 col-md-12 col-xl-12">
            <!-- Zero config.table start -->
            	<div class="card">
      				
      				<div class="card-body">
      					<div class="row">
      						
      						<div class="col-md-12">
      							

                    <div class="form_select">
                        
                        <div class="col-md-6">

    
                          {{ Form::open(['url'=>'login_copropiedad' ]) }}
                             
                            <div class="col-lg-12">
                               
                               <div class="form-group row ">
                                    

                                    <label class="col-sm-12 col-form-label">Seleccione la Copropiedad *</label>


                                     <div class="col-md-7 col-lx-7 col-sm-12 p-t-10"  >

                                        <select id="copropiedad_id" name="copropiedad_id" class="form-control form-txt-primary form-control-primary"
                                        placeholder="-- Seleccione --"
                                        >
                                            
                                             <option value="A">-- Seleccione --</option>
    
                                             @foreach( $cxuserSql as $sql )
                                              
                                              <option value="{{ $sql->copropiedad->id }}">{{ $sql->copropiedad->name }}</option>
                                             

                                            
                                                  
                                            @endforeach
                                          </select>
                                    </div>

                                  </div>
                            </div>
                          
                            

                             <div class="row p-t-20">
                                 <div class="col-lg-12 col-sm-12 mob-product-btn">
                                      <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">
                                          <i class="icofont icofont-pencil f-16"></i><span class="m-l-10">ENVIAR</span>
                                      </button>
                                      <a href="{{route('copropiedad.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Cancelar</a>
                                      
                                  </div>
                              </div>
                          {{ Form::close()}}
                          
                        </div>
                    </div>

                  
                     
      						</div>

      					</div>
      				</div>

                 
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Page-body end -->
  </div>


</div>

@endsection