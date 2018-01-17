<div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
	{!! Form::label('text', 'Quotes', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('text', null, ['class'=>'form-control']) !!}
		{!! $errors->first('text', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-8 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>