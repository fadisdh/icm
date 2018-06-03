@extends('layout.main')


@section('content')
@parent

{{ Form::model($template, array('route' => array('template.save.post', $template->id ? $template->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
	
  <!-- First Name -->
	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">
    {{ Form::label(trans("template.name"), 'Name', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("template.placeholder.template_name"))); }}
        @if($errors->first('name'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Submit -->
	<div class="form-group">
    	<div class="col-md-1 col-offest-md-11 pull-right">
			<button class="btn btn-primary">{{trans('common.submit')}}</button>
    	</div>
  </div>

	{{ Form::token() }}
  
{{ Form::close() }}
@stop