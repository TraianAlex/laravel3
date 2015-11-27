@extends('layouts.master')

@section('title')
	Join us
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
        	<div class="col-md-8 col-md-offset-2">
				@foreach($errors->all() as $error)
					<p>{!! $error !!}</p>
				@endforeach
				{!! Form::open(['url' => '/auth/register']) !!}
					<div class="form-group">
						{!! Form::label('username', 'Username:*') !!}
						{!! Form::text('username', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('name', 'Name:') !!}
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email:') !!}
						{!! Form::email('email', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('bio', 'Bio:') !!}
						{!! Form::textarea('bio', null, ['class' => 'form-control', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password:*') !!}
						{!! Form::password('password', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password-repeat', 'Password-Repeat:*') !!}
						{!! Form::password('password-repeat', ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::submit('Register', ['class' => 'btn btn-primary form-control']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
    </div>
@stop