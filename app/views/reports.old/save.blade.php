@extends('layout.main')


@section('content')
@parent

{{ Form::model($report, array('route' => array('project.report.save.post', $report->id ? $report->id : 0, $projectId), 'class' => 'form-horizontal', 'role' => 'form')) }}
  <nav class="page-actions container-fluid" class="page-actions">
    <div class="row">
      <div class="title col-md-3"><i class="fa fa-cog"></i> {{$report->id ? 'Edit Report' : 'New Report'}}</div>
      <div class="actions col-md-9">
          <div class="btns pull-right">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
            <a href="{{URL::route('project.reports')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
          </div>
      </div>
    </div>
  </nav><!-- .actions -->

  <!-- Name -->
  <div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('name', trans("report.name"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        <?php $date = date('Y-m-d'); ?>
        {{ Form::date('date', isset($report->date) ? $report->date : ( Input::old('date') ? Input::old('date') : $date ), array('class' => 'form-control')) }}
         @if($errors->first('date'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- Submit -->
  <div class="form-group">
    <div class="col-md-12">
      <div class="btns pull-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        <a href="{{URL::route('project.reports')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
      </div>  
    </div>
  </div>

	{{ Form::token() }}
  
{{ Form::close() }}
@stop