@extends('layouts.master')

@section('title')
	{{ e($user->username) }}
@stop

@section('content')
	<div class="panel panel-info">
	  <div class="panel-heading">
			<h3 class="panel-title">Username: {{ e($user->username) }}</h3>
	  </div>
	  <div class="panel-body">
		<p>{{ e($user->name) }}</p>
		<p>{{ e($user->email) }}</p>
		<p>{{ e($user->bio) }}</p>
	  </div>
  		@if($owner)
  			<div class="panel-footer">
				{!! Html::link('users/'.$user->id.'/edit', 'Edit My Profile') !!}
			</div>
		@endif
	  </div>
	</div>
@stop