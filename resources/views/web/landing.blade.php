@extends('layouts.landing')


@section('content')


    
    @if($landing->url_logo)
    <div class="container">
         <div class="logoMenu ">
            <img src="{{ $landing->url_logo}}">
        </div>
    </div>
       

    @else
         <div class="logoMenu">
            <img src="{{url('admin/media/img/Logo_Prueba.png')}}">
        </div>
    @endif
        
        <div class="menu">
             <div class="container">            
                <div class=" d-flex justify-content-end">
                    <div class="menu-items">
                        <a class="btn1 btn-beehive" href="#">Home</a>
                        <a class="btn1 btn-beehive" href="#">Home</a>
                        <a class="btn1 btn-beehive" href="#">Home</a>
                        <a class="btn1 btn-beehive" href="#">Home</a>
                        <a class="btn1 btn-beehive" href="#">Home</a>
                    </div>
                </div>        
            </div>
        </div>
       
        
        <div class="homeContainer container">

         @if($landing->url_banner)
            <div class="imgPPrincipal">
                <img src="{{$landing->url_banner}}" class="" height="400" width="100%">
            </div>
        @else
            <div class="imgPPrincipal">
                <img src="{{url('admin/media/img/Propiedad_Prueba2.jpg')}}" class="" height="400" width="100%">
            </div>
        @endif
       
            <div class="imgAmenidad">
                <div class="row">

                @if($landing->url_card_1)
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{$landing->url_card_1}}" class="card-img">
                            <!-- <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div> -->
                        </div>
                    </div>
                @else
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{url('admin/media/img/Amenidad1.png')}}" class="card-img">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                @endif

                 @if($landing->url_card_2)
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{$landing->url_card_2}}" class="card-img">
                           <!--  <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div> -->
                        </div>
                    </div>
                @else
                <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{url('admin/media/img/Amenidad1.png')}}" class="card-img">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                @endif



                @if($landing->url_card_3)
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{$landing->url_card_3}}" class="card-img">
                            <!-- <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div> -->
                        </div>
                    </div>
                @else
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{url('admin/media/img/Amenidad1.png')}}" class="card-img">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                @endif

                 @if($landing->url_card_4)
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{$landing->url_card_4}}" class="card-img">
                            <!-- <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div> -->
                        </div>
                    </div>

                @else
                    <div class="col">
                        <div class="card bg-dark text-white">
                        <img src="{{url('admin/media/img/Amenidad1.png')}}" class="card-img">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                @endif

                </div>
            </div>

            <div class="infoConjunto">
                <div class="row">
                    <div class="col-8">
                        <div class="card bg-light mb-8" >
                            <div class="card-header FBold">DESCRIPCION CONJUNTO</div>
                            <div class="card-body">
                                <p class="card-text">
                                    {!! $landing->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card bg-light mb-8" >
                            <div class="card-header FBold">INFORMACION PRINCIPAL</div>
                            <div class="card-body">                                
                                
                                   {!! $landing->info !!}
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>
        
        <footer >
            <div class="container">
                <div class="row">
                    <div class="col-6 text-white">
                        <h5 class="FBold">Informacion de Contacto</h5>
                        
                         {!! $landing->contact !!}
                    </div>        
                    <div class="col-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.51641094638!2d-74.24789646645122!3d4.6482837168169935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses!2sco!4v1576872302771!5m2!1ses!2sco" width="200" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div> 
                    <div class="col-3">
                        <span class="FBold text-white">Descargar APP</span>
                        <br>
                        <button type="button" class="btn btn-light">
                            <img src="{{url('admin/media/img/Logo_Beehive2.png')}}" height="100" width="100">
                        </button>
                    </div>         
                </div>
            </div>
        </footer>



@endsection