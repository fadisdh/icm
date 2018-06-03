@extends('layout.main')


@section('content')
@parent



{{ Form::model($project, array('route' => array('project.save.post', $project->id ? $project->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
<nav class="page-actions container-fluid" class="page-actions">
  <div class="row">
    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$project->id ? 'Edit Project' : 'New Project'}}</div>
    <div class="actions col-md-9">
        <div class="btns pull-right">
          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>
          <a href="{{URL::route('projects')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>
        </div>
    </div>
  </div>
</nav><!-- .actions -->
  <!-- Name -->
	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('name', trans("project.name"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("project.placeholder.name"))); }}
        @if($errors->first('name'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- name_arabic -->
  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('name_arabic', trans("project.name_arabic"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("project.placeholder.name_arabic"))); }}
        @if($errors->first('name_arabic'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>

  <!-- description -->
  <div class="form-group {{ $errors->first('description') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('description', trans("project.description"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-10">
        {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => trans("project.placeholder.description"))); }}
        @if($errors->first('description'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>
  {{ Form::token() }}
  
{{ Form::close() }}


@if($project->id)
<div class="section">
  <div class="section-notification">
    @if(Session::has('success'))
      <div class="alert alert-info">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif

    @if(Session::has('error'))
      <div class="alert alert-danger">
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      </div>
    @endif
  </div>

  <div class="section-header row">
    <div class="col-md-6">
      <h3 class="section-title">Divions, Sections & Items</h3>
    </div>
    <div class="col-md-6">
       <div class="btns pull-right">
          <a href="#" class="btn btn-default" data-toggle="modal" data-target="#importDSI">Import</a>
          <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addDivision">Add Divsion</a>
          <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addSection">Add Section</a>
          <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addItem">Add Item</a>
        </div>  
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Code</th>
        <th>Divion</th>
        <th>Section</th>
        <th>Item</th>
        <th>Qty</th>
        <th>Unit</th>
        <th>Unit Rate</th>
        <th>Amount</th>
        <th><span class="glyphicon glyphicon-trash"></span></th>
      </tr>
    </thead>
    <tbody>
      @foreach($project->divisions as $division)
        @foreach($division->sections as $section)
          @foreach($section->items as $item)
            <tr>
              <td>{{ $division->code . $section->code . $item->code }}</td>
              <td>{{ $division->name }}</td>
              <td>{{ $section->name }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ $item->unit }}</td>
              <td>{{ $item->unit_rate }}</td>
              <td>{{ $item->amount }}</td>
              <td><a href="{{ URL::route('project.deleteDSI', $item->id) }}"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
          @endforeach
        @endforeach
      @endforeach
    </tbody>
  </table>
  <div class="clearfix">
    <div class="btns pull-right">
      <a href="#" class="btn btn-default" data-toggle="modal" data-target="#importDSI">Import</a>
      <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addDivision">Add Divsion</a>
      <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addSection">Add Section</a>
      <a href="#" class="btn btn-default" data-toggle="modal" data-target="#addItem">Add Item</a>
    </div>  
  </div>
</div><!-- .section -->


<div id="addDivision" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Division</h4>
      </div>
      {{ Form::open(array('route' => array('project.addDSI', $project->id ? $project->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
      <div class="modal-body">
         
        <div class="form-group">
          {{ Form::label('code', 'Code', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('code', null, array('class' => 'form-control col-md-3', 'placeholder' => 'Code')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('name', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Name')); }}
          </div>
        </div>

        {{ Form::hidden('type', 'division') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::token() }}
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="addSection" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Section</h4>
      </div>
      {{ Form::open(array('route' => array('project.addDSI', $project->id ? $project->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
      <div class="modal-body">
        <div class="dsi">
          <!-- Divisions -->
          <div class="form-group {{ $errors->first('division') ? 'has-error has-feedback' : '' }}">
            {{ Form::label('division', trans("report.division"), array('class' => 'col-md-2 control-label')) }}
            <div class="col-md-10">
              {{ Form::select('division', array(), null, array('id' => 'divisions','data-url' => URL::route('json.divisions', $project->id), 'class' => 'form-control')) }}
            </div>
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('code', 'Code', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('code', null, array('class' => 'form-control col-md-3', 'placeholder' => 'Code')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('name', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Name')); }}
          </div>
        </div>
        {{ Form::hidden('type', 'section') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::token() }}
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="addItem" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      {{ Form::open(array('route' => array('project.addDSI', $project->id ? $project->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}
      <div class="modal-body">
          <div class="dsi">
            <!-- Divisions -->
            <div class="form-group {{ $errors->first('division') ? 'has-error has-feedback' : '' }}">
              {{ Form::label('division', trans("report.division"), array('class' => 'col-md-2 control-label')) }}
              <div class="col-md-10">
                {{ Form::select('division', array(), null, array('id' => 'divisions', 'data-url' => URL::route('json.divisions', $project->id), 'class' => 'form-control')) }}
              </div>
            </div>

            <!-- Sections -->
            <div class="form-group {{ $errors->first('section') ? 'has-error has-feedback' : '' }}">
              {{ Form::label('section', trans("report.section"), array('class' => 'col-md-2 control-label')) }}
              <div class="col-md-10">
                {{ Form::select('section', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-url' => URL::route('json.sections', $project->id), 'class' => 'form-control')) }}
              </div>
            </div>
          </div>

        <div class="form-group">
          {{ Form::label('code', 'Code', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('code', null, array('class' => 'form-control col-md-3', 'placeholder' => 'Code')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('name', 'Name', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('name', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Name')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('quantity', 'Quantity', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('quantity', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Quantity')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('unit', 'Unit', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('unit', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Unit')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('unit_rate', 'Unit Rate', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::number('unit_rate', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Unit Rate')); }}
          </div>
        </div>

        <div class="form-group">
          {{ Form::label('amount', 'Amount', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::number('amount', null, array('class' => 'form-control col-md-9', 'placeholder' => 'Amount')); }}
          </div>
        </div>
        {{ Form::hidden('type', 'item') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::token() }}
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Import DSI -->
<div id="importDSI" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Import Divisions, Sections and Items</h4>
      </div>
      {{ Form::open(array('route' => array('project.importDSI', $project->id ? $project->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files'=> true)) }}
      <div class="modal-body">
        <div class="form-group">
          {{ Form::label('file', 'File', array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::file('file', null, array('class' => 'form-control col-md-3', 'placeholder' => 'Code')); }}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::token() }}
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endif


@stop