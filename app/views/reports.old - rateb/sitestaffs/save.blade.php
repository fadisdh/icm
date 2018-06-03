@extends('layout.main')


@section('content')
@parent

  <!-- Message -->
  @if(Session::has('action'))
    <div class="alert {{ Session::get('result') ? 'alert-info' : 'alert-danger' }}">
      {{ Session::get('message') }}
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
  @endif
  
  <div id="page-content" class="page-content">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>{{trans('report.sitestaff.name')}}</th>
          {{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}
          <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>
          <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($siteStaffs as $siteStaff)
          <tr>
            <td>{{$siteStaff->id}}</td>
            <td>{{$siteStaff->staff_id}}</td>
            <td><a href="{{URL::route('report.sitestaff.edit', $siteStaff->id)}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>
            <td><a href="{{URL::route('report.sitestaff.delete', $siteStaff->id)}}" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>
          </tr>
        @endforeach
        
      </tbody>
    </table>

    <?php echo $siteStaffs->links(); ?>

    <h3>{{trans('common.add_new') .' ' . trans('report.site_staff')}}</h3>

    {{ Form::open(array('route' => array('report.sitestaffs.save.post', $report->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
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

    <!-- Divisions -->
    <div class="form-group {{ $errors->first('divisions') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('divisions', trans("report.division"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::select('divisions', array(), null, array('id' => 'divisions', 'class' => 'form-control expandable', 'data-url' => URL::route('json.divisions', $project->id), 'data-target' => '#type-expandable')) }}
          @if($errors->first('divisions'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Sections -->
    <div class="form-group {{ $errors->first('sections') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('sections', trans("report.sections"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::select('sections', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-url' => URL::route('json.sections', $project->id), 'class' => 'form-control expandable', 'data-target' => '#type-expandable')) }}
          @if($errors->first('sections'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Items -->
    <div class="form-group {{ $errors->first('items') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('items', trans("report.sections"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::select('items', array(0 => 'Fill Section First'), null, array('id' => 'items', 'data-url' => URL::route('json.items', $project->id), 'class' => 'form-control')) }}
          @if($errors->first('items'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Submit -->
    <div class="form-group">
      <div class="col-md-12">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>
          <a href="{{URL::route('report.company.labors.save')}}" class="btn btn-primary">{{trans('common.next_step')}} <i class="fa fa-chevron-right"></i></a>
        </div>  
      </div>
    </div>

    {{ Form::token() }}
  {{ Form::close() }}

  </div><!-- .page-content -->

@stop