@extends('layouts.master')

@section('title')
	Edit My Profile
@stop

@section('content')
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
	{!! Form::open(array('url' => 'users/'.$id, 'method' => 'PUT')) !!}
		<p>
			{!! Form::label('username', 'New Username') !!}
			{!! Form::text('username') !!}
		</p>
		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
			<!--input type="text" class="form-control" name="name" value="Auth::user()->name"-->
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
		<p>
			{!! Form::label('bio', 'New Bio') !!}
			{!! Form::textarea('bio') !!}
		</p>
		<p>
			{!! Form::label('password', 'New Password') !!}
			{!! Form::password('password') !!}
		</p>
		<p>
			{!! Form::submit('Update Me!') !!}
		</p>
	{!! Form::close() !!}
	<hr>
	{!! Form::open(array('url' => 'users/'.$id, 'method' => 'DELETE')) !!}
		{!! Form::submit('Delete Me!') !!}
	{!! Form::close() !!}
@stop