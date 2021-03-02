 <!-- Formulario Create -->
                 
  <div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
      <div class="row">

        <div class="col-lg-12 col-md-12 m-b-20">
          <h3 class="text-primary">{{ $copropiedad->name}}</h3>
        </div>

        
        <div class="col-sm-6">

          <div class="card">
          <div class="card-block">
              <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informacion</h6>
              <div class="row">
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Direccion</p>
                      <h6 class="text-muted f-w-400">{{ $copropiedad->address}}</h6>
                  </div>
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Telefono</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->phone_1}}</h6>
                  </div>
              </div>
              
               <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Ubicacion</h6>
               <div class="row">
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Departamento</p>
                      <h6 class="text-muted f-w-400">{{ $copropiedad->department}}</h6>
                  </div>
                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Ciudad</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->city}}</h6>
                  </div>

                  <div class="col-sm-4">
                      <p class="m-b-10 f-w-600">Localidad</p>
                      <h6 class="text-muted f-w-400"> {{ $copropiedad->location}}</h6>
                  </div>
              </div>
             <!--  <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">sss</h6>
              <div class="row">
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Recent</p>
                      <h6 class="text-muted f-w-400"></h6>
                  </div>
                  <div class="col-sm-6">
                      <p class="m-b-10 f-w-600">Most Viewed</p>
                      <h6 class="text-muted f-w-400">Able Pro Admin</h6>
                  </div>
              </div> -->
              <!-- <ul class="social-link list-unstyled m-t-40 m-b-10">
                  <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook"><i class="feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter"><i class="feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram"><i class="feather icon-instagram instagram" aria-hidden="true"></i></a></li>
              </ul> -->
          </div>
        </div>
      </div>
            
        <div class="col-md-5 col-lg-5 m-b-5">
             
              
              <div class="box_img_profile">
                <div class="img_profile">
                 
                    @if(!$copropiedad->file)
                      <img class="img img-fluid" src="{{url('admin/images/not-found-icon-28.jpg')}}" alt="Image">

                    @else
                      
                      <img class="img img-fluid" src="{{ $copropiedad->file }}" alt="Image">
                    @endif
                </div>
            </div>
             
        </div>  


                  
            </div>
          </div>
                          
                          <!--  -->


            
</div>
      
