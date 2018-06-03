@extends('layout.main')


@section('content')
@parent

{{ Form::model($siteStaff, array('route' => array('report.sitestaff.edit.post', $siteStaff->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
    <!-- Site Staff -->
    <div class="form-group {{ $errors->first('staff_id') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('staff_id', trans("report.staff_id"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::text('staff_id', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.staff_id"))); }}
          @if($errors->first('staff_id'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Working Hours -->
    <div class="form-group {{ $errors->first('working_hours') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('working_hours', trans("report.working_hours"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::text('working_hours', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.working_hours"))); }}
          @if($errors->first('working_hours'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Submit -->
    <div class="form-group">
      <div class="col-md-12">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>
        </div>  
      </div>
    </div>

    {{ Form::token() }}
  {{ Form::close() }}
@stop