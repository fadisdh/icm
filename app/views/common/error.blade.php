@extends('layout.main')

@section('content')
	@parent
	<div class="bigerror">
		<p>{{ Config::get('message.common.error') }}</p>
		<p><a href="{{ URL::route('home') }}">Go Home</a></p>
	</div>
@stop