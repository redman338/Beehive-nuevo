<form id="formContac" action="{{url('landing/update/text')}}" method="POST">
@csrf

<div class="form-group">
	{{ Form::label('contact', 'Informacion de Contacto' )}}
	
		<textarea name="textinput" class="form-control editor textInput" id="contact">
			{{ $value->contact }}
		</textarea>
		
</div>
	
	<input type="hidden" class="saveoption" name="option" value="contact">


	<input type="hidden" name="value_id" class="value_id" value="">

 	<div class="col">
       <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Actualizar</button>
      </div>
</form>