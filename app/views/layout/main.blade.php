@extends('layout.base')



@section('main')

	<div class="sidebar">

		@section('sidebar')

			@include('common.sidebar')

		@show

	</div><!-- .sidebar -->

	<div class="main">

		<div class="container-fluid">

			<div class="topbar">

				@section('topbar')

					@include('common.topbar')

				@show

			</div>

			<div class="content">

				@section('content')

					@include('common.content')

				@show

			</div>

		</div>

	</div><!-- .main -->

@stop