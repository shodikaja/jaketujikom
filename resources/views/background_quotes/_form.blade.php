<div hidden="" {{ $errors->has('text') ? ' has-error' : '' }}">
	{!! Form::label('text', 'Sejarah', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('text', null, ['class'=>'form-control']) !!}
		{!! $errors->first('text', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
	{!! Form::label('background', 'Background', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('background') !!}
		@if (isset($bgquotes) && $bgquotes->background)
		<p>
			{!! Html::image(asset('img/img5/'.$bgquotes->background), null, ['class'=>'img-rounded img-responsive']) !!}
		</p>
		@endif
		{!! $errors->first('background', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-8 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>