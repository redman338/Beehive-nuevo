@extends('layouts.admin')

@section('content')
	

<div class="page-wrapper">
        <!-- Page-header start -->
    <div class="page-header">
      <div class="row align-items-end">

        <div class="col-lg-8">
          <div class="page-header-title">
              <div class="d-inline">
                  <h4>Zonas Comunes </h4>
                  
              </div>
          </div>
        </div>


         <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('dashboard')}}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!"> Zonas Comunes</a>
                    </li>
              
                </ul>
            </div>
        </div>
        
       
      </div>  
    </div>
			
		<div class="col-md-12">
                                                <!-- Product detail page start -->
        <div class="card product-detail-page">
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-5 col-xs-12">
                        <div class="port_details_all_img row">
                            <div class="col-lg-12 m-b-15">
                                <div id="big_banner" class="slick-initialized slick-slider">
                                   
                                        <img class="img img-fluid" src="{{$zonacomun->file }}" alt="Big_ Details">
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                      </div>
                    <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                        <div class="row">
                            <div>
                                
                                <div class="col-lg-12">
                                    <h4 class="pro-desc">{{$zonacomun->name}}</h4>
                                </div>

                                 <div class="col-lg-12">
                                 <h6 class="f-16 f-w-600 m-t-10 m-b-10">Valor por Hora</h6>
                                    <span class="text-primary product-price"><i class="icofont icofont-cur-dollar"></i>{{ number_format(
                        $zonacomun->valorxhora) }}</span>
                                    <hr>
                                     <h6 class="f-16 f-w-600 m-t-10 m-b-10">Descripcion</h6>
                                    <p>{{$zonacomun->description}}
                                    </p>
                                    <hr>
                                   
                                </div>
                                <div class="col-lg-12">
                                     <h6 class="f-16 f-w-600 m-t-10 m-b-10">Disponible: </h6>
																		
																		 <div class="border-checkbox-section">
                                    	<?php if($zonacomun->disponible == 1){ ?>

                                    			<div class="border-checkbox-group border-checkbox-group-primary">
									                          <input class="border-checkbox" type="checkbox" id="checkbox1" name="disponible" checked>
									                             <label class="border-checkbox-label" for="checkbox1">Si</label>
									                        </div>

									                     <?php }else{ ?>
                                   	
                          
																				
																				<div class="border-checkbox-group border-checkbox-group-danger">
									                          <input class="border-checkbox" type="checkbox" id="checkbox1" name="disponible" value="0" checked>
									                             <label class="border-checkbox-label" for="checkbox1">No</label>
									                        </div>

                                   	   <?php } ?>
                                   	</div>
                                </div>
                               
                               
                                
                            <!--     <div class="col-lg-12 col-sm-12 mob-product-btn">
                                    <button type="button" class="btn btn-primary waves-effect waves-light m-r-20">
                                        <i class="icofont icofont-cart-alt f-16"></i><span class="m-l-10">RESERVAR</span>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary waves-effect waves-light m-r-20" data-toggle="tooltip" title="" data-original-title="Add to wishlist">
                                        <i class="icofont icofont-heart-alt f-16 m-0"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-toggle="tooltip" title="" data-original-title="Quick view">
                                        <i class="icofont icofont-eye-alt f-16 m-0"></i>
                                    </button>
                                </div> -->
                            </div>

                        </div>
                         <div class="row p-t-40">
                       <div class="col-lg-12 col-sm-12 mob-product-btn">
                           


                            <a href="{{route('zonascomunes.index')}}" class="btn btn-inverse waves-effect waves-inverse"><i class="icofont icofont-close f-16"></i>Regresar</a>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product detail page end -->
    </div>
</div>

<!-- @section('scripts')
<script type="text/javascript" src="{{url('admin/js/bower_components/slick-carousel/js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('admin/js/product-detail.js')}}"></script>
@endsection -->
@endsection