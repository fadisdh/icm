@extends('layout.main')


@section('content')
@parent



{{ Form::model($occupation, array('route' => array('occupation.save.post', $occupation->id ? $occupation->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
  <nav class="page-actions container-fluid" class="page-actions">
  <div class="row">
    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$occupation->id ? 'Edit Occupation' : 'New Occupation'}}</div>
    <div class="actions col-md-9">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
          <a href="{{URL::route('occupations')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
        </div>
    </div>
  </div>
</nav><!-- .actions -->
  <!-- Name -->
	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('name', trans("occupation.name"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("occupation.placeholder.name"))); }}
        @if($errors->first('name'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- name_arabic -->
  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('name_arabic', trans("occupation.name_arabic"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("occupation.placeholder.name_arabic"))); }}
        @if($errors->first('name_arabic'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Submit -->
  <div class="form-group">
    <div class="col-md-12">
      <div class="btns pull-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        <a href="{{URL::route('occupations')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
      </div>  
    </div>
  </div>

	{{ Form::token() }}
  
{{ Form::close() }}
@stop