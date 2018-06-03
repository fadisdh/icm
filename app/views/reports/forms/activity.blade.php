  <!-- Message -->

  @if(Session::has('action'))

  <div class="alert {{ Session::get('result') ? 'alert-info' : 'alert-danger' }}">

      {{ Session::get('message') }}

      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

  </div>

  @endif



  <div id="page-content" class="page-content">

  <table class="table sortable">

      <thead>

        <tr>

          <th>#</th>

          <th>{{trans('report.activity')}}</th>

          {{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

          <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

          <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

  </thead>

  <tbody>

    @if(!empty($activities))

    @foreach($activities as $act)

    <tr {{ $act->id == $activity->id ? 'class="selected"' : '' }}>

      <td>{{$act->id}}</td>

      <td>{{$act->activity}}</td>

      <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'activity' => $act->id)) }}#activity" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

      <td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

  </tr>

  @endforeach

  @else

  <tr>

    <td colspan="5" class="text-center">{{ trans('common.empty') }}</td>

</tr>

@endif



</tbody>

</table>



<div class="panel panel-default save-form">

  <div class="panel-heading" role="tab" id="headingTwo">

    <h4 class="panel-title">

      <a class="collapsed" data-toggle="collapse" href="#addnew_activity" aria-expanded="true" aria-controls="addnew_activity">

        {{ $activity->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

    </a>

</h4>

</div>

<div id="addnew_activity" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

    <div class="panel-body">

      {{ Form::model($activity, array('route' => array('report.activity.save.post', $report->id, $activity->id ? $activity->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}

      <!-- activity -->

      <div class="form-group {{ $errors->first('activity') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('activity', trans("report.activity"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

            {{ Form::text('activity', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.activity"))) }}

            @if($errors->first('activity'))

            <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

        </div>

    </div>



    <table id="sitestaff-dsi" class="table table-dsi">
      <thead>
        <tr>
          <th width="30%">Division</th>
          <th width="30%">Section</th>
          <th width="30%">Item</th>
          <th width="10%">Share</th>
          <th><i class="fa fa-times"></i></th>
      </tr>
  </thead>
  <tbody>
    @if($activity->dsi)
    <?php $i = 0; ?>
    @foreach(json_decode($activity->dsi) as $data)
    <tr class="dsi">
      <td>{{ Form::select('dsi[' . $i . '][division]', array(), null, array('id' => 'divisions', 'data-val' => $data->division, 'data-url' => URL::route('json.divisions', $report->project_id), 'class' => 'form-control')) }}</td>
      <td>{{ Form::select('dsi[' . $i . '][section]', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-val' => $data->section, 'data-url' => URL::route('json.sections', $report->project_id), 'class' => 'form-control')) }}</td>
      <td>{{ Form::select('dsi[' . $i . '][item]', array(0 => 'Fill Section First'), null, array('id' => 'items', 'data-val' => $data->item, 'data-url' => URL::route('json.items', $report->project_id), 'class' => 'form-control')) }}</td>
      <td>
        <div class="input-group">
          <input type="text" name="dsi[{{ $i }}][share]" value="{{ $data->share }}" class="form-control">
          <span class="input-group-addon" id="basic-addon1">%</span>
      </div>
  </td>
  <td><a href="" class="btn delete"><i class="fa fa-times"></i></a></td>
</tr>
<?php $i++; ?>
@endforeach
@else
<tr class="dsi">
  <td>{{ Form::select('dsi[0][division]', array(), null, array('id' => 'divisions', 'data-url' => URL::route('json.divisions', $report->project_id), 'class' => 'form-control')) }}</td>
  <td>{{ Form::select('dsi[0][section]', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-url' => URL::route('json.sections', $report->project_id), 'class' => 'form-control')) }}</td>
  <td>{{ Form::select('dsi[0][item]', array(0 => 'Fill Section First'), null, array('id' => 'items', 'data-url' => URL::route('json.items', $report->project_id), 'class' => 'form-control')) }}</td>
  <td>
    <div class="input-group">
      <input type="text" name="dsi[0][share]" class="form-control">
      <span class="input-group-addon" id="basic-addon1">%</span>
  </div>
</td>
<td><a href="" class="btn delete"><i class="fa fa-times"></i></a></td>
</tr>
@endif
<tr>
  <td colspan="5"><a href="javascript:void(0);" class="more more-table more-dsi" data-tmpl="#tmpl-dsi"><i class="fa fa-plus"></i> ADD NEW</a></td>
</tr>
</tbody>
</table>

<!-- Submit -->

<div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>

        @if($activity->id)

        <a href="{{ URL::route('project.report.save', $report->id) }}#activity" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

        @endif

    </div>  

</div>

</div>



{{ Form::token() }}

{{ Form::close() }}



</div><!-- .panel-body -->

</div><!-- .panel-collapse -->

</div><!-- .panel -->



  </div><!-- .page-content -->