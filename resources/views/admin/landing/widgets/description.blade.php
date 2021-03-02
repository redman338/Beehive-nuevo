
<form id="formDescription" action="{{url('landing/update/text')}}" method="POST">
	
	@csrf
	
	<div class="form-group">
		{{ Form::label('textinput', 'Descripción' )}}
		
		<textarea name="textinput" class="form-control editor textInput" id="description">
			{{ $value->description }}
		</textarea>
		
	</div>
	
	<input type="hidden" class="saveoption" name="option" value="description">


	<input type="hidden" name="value_id" id="value_id" class="value_id" value="">
	
	 <div class="col">
       <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Actualizar</button>
      </div>
</form>