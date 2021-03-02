

<form id="formDescription" action="{{url('landing/update/text')}}" method="POST">
@csrf
<div class="form-group">
	{{ Form::label('textinput', 'Mas Informacion' )}}

		<textarea name="textinput" class="form-control editor textInput" id="masinfo">
			{{ $value->info }}
		</textarea>


</div>

	<input type="hidden" class="saveoption" name="option" value="info">


	<input type="hidden" name="value_id" class="value_id" value="">
	
	 <div class="col">
       <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-save"></i> Actualizar</button>
      </div>
</form>