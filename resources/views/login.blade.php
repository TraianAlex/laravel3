@extends('layouts.master')

@section('title')
	Login
@stop

@section('content')
	{!! Form::open(array('url' => 'login')) !!}
		<p>
			@if($errors->has('username'))
				<div class="alert alert-danger">
					{{ $errors->first('email')}}
				</div>
			@endif
			{!! Form::label('username') !!}
			{!! Form::text('username') !!}
		</p>
		<p>
			@if($errors->has('password'))
				<div class="alert alert-danger">
					{{ $errors->first('password')}}
				</div>
			@endif
			{!! Form::label('password') !!}
			{!! Form::password('password') !!}
		</p>
		<p>
			{!! Form::submit('login') !!}
		</p>
	{!! Form::close() !!}
@stop