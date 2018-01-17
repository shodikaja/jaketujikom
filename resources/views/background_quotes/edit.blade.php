@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/bgquotes') }}">Background Quotes</a></li>
				<li class="active">Ubah Profil Background Quotes</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Ubah Profil Background Quotes</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($bgquotes, ['url' => route('bgquotes.update', $bgquotes->id),
					'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
					@include('background_quotes._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection