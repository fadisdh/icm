@extends('layout.main')


@section('content')
@parent

@if($labors)

  {{ Form::open(array('route' => array('report.company.labors.save.post', $reportId), 'class' => 'form-horizontal', 'role' => 'form')) }}

  @foreach($labors as $labor)

    <!-- labor -->
      <div class="form-group {{ $errors->first('labor_id') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('labor_id['.$labor->id.']', trans("report.labor_id"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            <?php $report = Report::find($reportId); ?>
            {{ Form::select('labor_id['.$labor->id.']', labor::getLabors($report->project_id), $labor->labor_id ? $labor->labor_id : null, array('class' => 'form-control')) }}
            @if($errors->first('labor_id'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- Working Hours -->
      <div class="form-group {{ $errors->first('working_hours') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('working_hours['.$labor->id.']', trans("report.working_hours"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('working_hours['.$labor->id.']', $labor->working_hours ? $labor->working_hours : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.working_hours"))); }}
            @if($errors->first('working_hours'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- overtime -->
      <div class="form-group {{ $errors->first('overtime') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('overtime['.$labor->id.']', trans("report.overtime"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('overtime['.$labor->id.']', $labor->overtime ? $labor->overtime : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.overtime"))); }}
            @if($errors->first('overtime'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- Number of items -->
      <div class="form-group {{ $errors->first('items') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('items['.$labor->id.']', trans("report.items"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('items['.$labor->id.']', $labor->items ? $labor->items : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.items"))); }}
            @if($errors->first('items'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- distribution -->
      <div class="form-group {{ $errors->first('distribution') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('distribution['.$labor->id.']', trans("report.distribution"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('distribution['.$labor->id.']', $labor->distribution ? $labor->distribution : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.distribution"))); }}
            @if($errors->first('distribution'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

  @endforeach
    <!-- labor -->
    <div class="form-group {{ $errors->first('labor_id[]') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('labor_id[]', trans("report.labor_id"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
         <?php $report = Report::find($reportId); ?>
            {{ Form::select('labor_id[]', labor::getLabors($report->project_id), null, array('class' => 'form-control')) }}
        @if($errors->first('labor_id[]'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
    </div>

    <!-- Working Hours -->
    <div class="form-group {{ $errors->first('working_hours[]') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('working_hours[]', trans("report.working_hours"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::text('working_hours[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.working_hours"))); }}
          @if($errors->first('working_hours[]'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- overtime -->
      <div class="form-group {{ $errors->first('overtime') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('overtime[]', trans("report.overtime"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('overtime[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.overtime"))); }}
            @if($errors->first('overtime'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- Number of items -->
      <div class="form-group {{ $errors->first('items') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('items[]', trans("report.items"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('items[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.items"))); }}
            @if($errors->first('items'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

      <!-- distribution -->
      <div class="form-group {{ $errors->first('distribution') ? 'has-error has-feedback' : '' }}">
        {{ Form::label('distribution[]', trans("report.distribution"), array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('distribution[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.distribution"))); }}
            @if($errors->first('distribution'))
              <span class="glyphicon glyphicon-remove form-control-feedback"></span>
            @endif
          </div>
      </div>

    <!-- Divisions -->
    <div class="form-group {{ $errors->first('divisions[]') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('divisions[]', trans("report.division"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::select('divisions[]', Division::getDivisions($reportId), null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable')) }}
          @if($errors->first('divisions[]'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <ul id="type-expandable" class="expandable-wrapper">

      <li id="1">
        <!-- Sections -->
        <div class="form-group {{ $errors->first('sections[]') ? 'has-error has-feedback' : '' }}">
          {{ Form::label('sections[]', trans("report.sections"), array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-10">
              {{ Form::select('sections[]', Section::getSections(1), null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable')) }}
              @if($errors->first('sections[]'))
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
              @endif
            </div>
        </div>
      </li>

        <ul id="type-expandable" class="expandable-wrapper">
          <li id="2">
            <!-- Items -->
            <div class="form-group {{ $errors->first('items[]') ? 'has-error has-feedback' : '' }}">
              {{ Form::label('items[]', trans("report.sections"), array('class' => 'col-md-2 control-label')) }}
                <div class="col-md-10">
                  {{ Form::select('items[]', Item::getItems(1), null, array('class' => 'form-control')) }}
                  @if($errors->first('items[]'))
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                  @endif
                </div>
            </div>
          </li>
        </ul><!-- Item -->

    </ul><!-- Section -->

    <!-- Submit -->
    <div class="form-group">
      <div class="col-md-12">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        </div>  
      </div>
    </div>

    {{ Form::token() }}
    {{ Form::close() }}
@else

  {{ Form::open(array('route' => array('report.labor.save.post', 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
    <!-- Site Staff -->
    <div class="form-group {{ $errors->first('labor_id[]') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('labor_id[]', trans("report.labor_id"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::text('labor_id[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.labor_id"))); }}
          @if($errors->first('labor_id[]'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Working Hours -->
    <div class="form-group {{ $errors->first('working_hours[]') ? 'has-error has-feedback' : '' }}">
      {{ Form::label('working_hours[]', trans("report.working_hours"), array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-10">
          {{ Form::text('working_hours[]', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.working_hours"))); }}
          @if($errors->first('working_hours[]'))
            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
          @endif
        </div>
    </div>

    <!-- Submit -->
    <div class="form-group">
      <div class="col-md-12">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
        </div>  
      </div>
    </div>

    {{ Form::token() }}
  {{ Form::close() }}

@endif

@stop