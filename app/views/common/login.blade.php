@extends('layout.base')

@section('main')
	<div class="logo"><img src="{{ asset('assets/images/login-logo.png') }}" alt="UpIt"></div>
	<div class="box container">
		{{ Form::open(array('class' => 'form', 'role' => 'form')) }}
			<h2>System Login</h2>
			<h4 class="error">
				{{ $errors->first('email') | $errors->first('password') | $errors->first('message')}}
			</h4>
			<div class="form-group">
			    <div class="input-group">
			      	<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
			      	<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
			    </div>
			</div>

			<div class="form-group">
			    <div class="input-group">
			      	<div class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></div>
			      	<input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
			    </div>
			</div>

			{{ Form::submit('Login', array('class' => 'btn btn-primary submit pull-right')) }}
			{{ Form::token() }}
		{{ Form::close() }}
	</div><!-- .box -->
	<div class="powered"></div>
@stop