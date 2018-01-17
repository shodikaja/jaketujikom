<div class="form-group{{ $errors->has('text_besar') ? ' has-error' : '' }}">
	{!! Form::label('text_besar', 'Text Besar', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('text_besar', null, ['class'=>'form-control']) !!}
		{!! $errors->first('text_besar', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('text_kecil') ? ' has-error' : '' }}">
	{!! Form::label('text_kecil', 'Text Kecil', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('text_kecil', null, ['class'=>'form-control']) !!}
		{!! $errors->first('text_kecil', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
	{!! Form::label('background', 'Background', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('background') !!}
		@if (isset($Header) && $Header->background)
		<p>
			{!! Html::image(asset('img/img6/'.$Header->background), null, ['class'=>'img-rounded img-responsive']) !!}
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