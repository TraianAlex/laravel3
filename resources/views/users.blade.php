@extends('layouts.master')

@section('title')
	Users
@endsection

@section('content')
	@if(Auth::check())
		<div class="alert alert-info">
			Curent user: {{ Auth::user()->username }}
		</div>
	@endif
	@foreach ($users as $user)
		<div class="alert alert-success">
			<p>{{ $user->username }} ({!! Html::link('users/'.$user->id, 'profile') !!})</p>
		</div>
	@endforeach
	{!! $users->render() !!}
@endsection