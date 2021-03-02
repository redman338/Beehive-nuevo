@extends('layouts.admin')
@section('css')
  
  <link rel="stylesheet" type="text/css" href="{{url('admin/css/dropzone.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('admin/j-pro/css/j-pro-modern.css')}}">
  
  <script src="{{url('admin/js/file_uploader/dropzone.js')}}"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  

@endsection

@section('content')

 
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Review Product card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Crear Pagina de la Copropiedad</h5>
                    <span>{{ $cop_name }}</span>

                </div>

              


                <div class="card-block">
                    <div class="j-wrapper j-wrapper-640">
                        
                        <form action="{{route('landing-page.store')}}" method="post" class="j-pro" id="j-pro" >

                           @csrf 
                            <div class="j-content">
                                <!-- start name -->
                                <div class="j-unit">
                                    <label class="j-label">Url amigable</label>
                                    
                                    <div class="j-input">
                                        <input type="text" id="name" name="name" placeholder="www.beehive.com.co/es/micopropiedad" required>
                                    </div>
                                </div>
                                <!-- end name -->
                                <!-- start email-->
                                                  
                                  <div class="j-unit">
                                    
                                      <div class="j-input">
                                          <textarea placeholder="Url amigable" spellcheck="false" name="slug" id="slug" readonly="readonly"></textarea>
                                      </div>
                                  </div>
                                  <!-- end message -->
                                  <div class="j-divider j-gap-bottom-25"></div>
                                   
                                      <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                 
                                      <!-- end /.footer -->

                                        <div class="j-divider j-gap-bottom-25"></div>
                                  </form>
                                </div>
                              </div>
                            </div>
                              <!-- Review Product card end -->
                          </div>
                        </div>
                      </div>
@endsection

@section ('scripts')
<script src="{{ asset('admin/js/jquery.stringToSlug.min.js') }}"></script>
 <script src="{{url('admin/js/querys/landing.js')}}"></script>

<script type="text/javascript">
  
$(document).ready(function() {
    $("#name, #slug").stringToSlug({
      callback: function(text){
        $("#slug").val(text);
      }
    });
  });
</script>
 

@endsection