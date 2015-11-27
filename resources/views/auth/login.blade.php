@extends('layouts.master')

@section('title')
	Login
@stop

@section('content')
	@foreach($errors->all() as $error)
		<p>{!! $error !!}</p>
	@endforeach
	{!! Form::open(['url' => '/auth/login']) !!}
		<p>
			{!! Form::label('username') !!}
			{!! Form::text('username') !!}
		</p>
		<p>
			{!! Form::label('password') !!}
			{!! Form::password('password') !!}
		</p>
		<p>
			{!! Form::submit('login') !!}
		</p>
	{!! Form::close() !!}
@stop