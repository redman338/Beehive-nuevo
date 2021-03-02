<div class="form-group">
	{{ Form::label('name', 'Nombre del Permiso') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<hr>


@section('scripts')
<!-- <script src="{{ asset('admin/js/stringToSlug.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $("#name, #slug").stringToSlug({
      callback: function(text){
        $("#slug").val(text);
      }
    });
  });
</script> -->
 @endsection