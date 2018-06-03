@extends('layout.main')


@section('content')
@parent



{{ Form::model($attachment, array('route' => array('user.save.post', $attachment->id ? $attachment->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
	
<nav class="page-actions container-fluid" class="page-actions">
  <div class="row">
    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$attachment->id ? 'Edit Attachment' : 'New Aquipment'}}</div>
    <div class="actions col-md-9">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
          <a href="{{URL::route('attachments')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
        </div>
    </div>
  </div>
</nav><!-- .actions -->

  <!-- title -->
	<div class="form-group {{ $errors->first('title') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('title', trans("attachment.title"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => trans("attachment.placeholder.title"))); }}
        @if($errors->first('title'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- type -->
  <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('type', trans("attachment.type"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('type', null, array('class' => 'form-control', 'placeholder' => trans("attachment.placeholder.type"))); }}
        @if($errors->first('type'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- link -->
  <div class="form-group {{ $errors->first('link') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('link', trans("attachment.link"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('link', null, array('class' => 'form-control', 'placeholder' => trans("attachment.placeholder.link"))); }}
        @if($errors->first('link'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Submit -->
  <div class="form-group">
    <div class="col-md-12">
      <div class="btns pull-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        <a href="{{URL::route('attachments')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
      </div>  
    </div>
  </div>

	{{ Form::token() }}
  
{{ Form::close() }}
@stop