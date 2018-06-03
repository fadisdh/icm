@extends('layout.main')


@section('content')
@parent



{{ Form::model($user, array('route' => array('user.save.post', $user->id ? $user->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<nav class="page-actions container-fluid" class="page-actions">
  <div class="row">
    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$user->id ? 'Edit User' : 'New User'}}</div>
    <div class="actions col-md-9">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
          <a href="{{URL::route('users')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
        </div>
    </div>
  </div>
</nav><!-- .actions -->
  <!-- First Name -->
	<div class="form-group {{ $errors->first('firstname') ? 'has-error has-feedback' : '' }}">
		{{ Form::label('firstname', trans('user.firstname'), array('class' => 'col-md-2 control-label')) }}
    	<div class="col-md-10">
  			{{ Form::text('firstname', null, array('class' => 'form-control', 'placeholder' => trans('user.placeholder.firstname'))) }}
        @if($errors->first('firstname'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
    	</div>
  </div>

  <!-- Last Name -->
  <div class="form-group {{ $errors->first('lastname') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('lastname', trans('user.lastname'), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('lastname', null, array('class' => 'form-control', 'placeholder' => trans('user.placeholder.lastname'))) }}
        @if($errors->first('lastname'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Password -->
  <div class="form-group {{ $errors->first('password') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('lastname', trans('user.password'), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('user.placeholder.password'))) }}
        @if($errors->first('password'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Password Confirm -->
  <div class="form-group {{ $errors->first('password_confirmation') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('password_confirmation', trans('user.password_confirmation'), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => trans('user.placeholder.password_confirmation'))); }}
        @if($errors->first('password_confirmation'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Email -->
  <div class="form-group {{ $errors->first('email') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('email', trans('user.email'), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => trans('user.placeholder.email'))) }}
        @if($errors->first('email'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Role -->
  <div class="form-group {{ $errors->first('role_id') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('role_id', trans('user.role'), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::select('role_id', Role::getRoles(), null, array('class' => 'form-control')) }}
        @if($errors->first('role_id'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Submit -->
  <div class="form-group">
    <div class="col-md-12">
      <div class="btns pull-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        <a href="{{URL::route('users')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
      </div>  
    </div>
  </div>

	{{ Form::token() }}
  
{{ Form::close() }}
@stop