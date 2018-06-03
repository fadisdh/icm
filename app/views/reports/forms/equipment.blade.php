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

        <th>{{trans('report.dsi')}}</th>

        <th>{{trans('report.equipment')}}</th>

        <th>{{trans('report.type')}}</th>

        <th>{{trans('report.source')}}</th>

        <th>{{trans('report.quantity')}}</th>

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($equipments))

        @foreach($equipments as $eq)

          <tr {{ $eq->id == $equipment->id ? 'class="selected"' : '' }}>

            <td>{{ $eq->id }}</td>

            <td>{{ $eq->division ? $eq->getDSI() : 'Not Defined' }}</td>

            <td>{{ $eq->type == 'company_equipment' ? $eq->equipment->name : $eq->equipment_name }}</td>

            <td>{{ Config::get('vars\equipment_type.en.'. $eq->type) }}</td>

            <td>{{ $eq->source }}</td>

            <td>{{ $eq->quantity }}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'equipment' => $eq->id)) }}#equipment" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

            <td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

          </tr>

        @endforeach

      @else

        <tr>

          <td colspan="8" class="text-center">{{ trans('common.empty') }}</td>

        </tr>

      @endif

      

    </tbody>

  </table>

@if($equipment->id)

<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_equipment" aria-expanded="true" aria-controls="addnew_equipment">

          {{ $equipment->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_equipment" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">



        {{ Form::model($equipment, array('route' => array('report.equipment.save.post', $report->id, $equipment->id ? $equipment->id : 0, $equipment->equipment_id), 'class' => 'form-horizontal', 'role' => 'form')) }}


        <!-- Working Hours -->

        <div class="form-group {{ $errors->first('working_hours') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('working_hours', trans("report.working_hours"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('working_hours', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.working_hours"))) }}

              @if($errors->first('working_hours'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- Overtime -->

        <div class="form-group {{ $errors->first('overtime') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('overtime', trans("report.overtime"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('overtime', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.overtime"))) }}

              @if($errors->first('overtime'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- num_items -->

        <div class="form-group {{ $errors->first('num_items') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('num_items', trans("report.num_items"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('num_items', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.num_items"))) }}

              @if($errors->first('num_items'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- distribution -->

        <div class="form-group {{ $errors->first('distribution') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('distribution', trans("report.distribution"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('distribution', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.distribution"))) }}

              @if($errors->first('distribution'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <div class="dsi">

          <!-- Divisions -->

          <div class="form-group {{ $errors->first('division') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('division', trans("report.division"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('division', array(), null, array('id' => 'divisions', 'data-val' => $equipment->division_id, 'data-url' => URL::route('json.divisions', $report->project_id), 'class' => 'form-control')) }}

                @if($errors->first('division'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>



          <!-- Sections -->

          <div class="form-group {{ $errors->first('section') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('section', trans("report.section"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('section', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-val' => $equipment->section_id, 'data-url' => URL::route('json.sections', $report->project_id), 'class' => 'form-control')) }}

                @if($errors->first('section'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>



          <!-- Items -->

          <div class="form-group {{ $errors->first('item') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('item', trans("report.item"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('item', array(0 => 'Fill Section First'), null, array('id' => 'items', 'data-val' => $equipment->item_id, 'data-url' => URL::route('json.items', $report->project_id), 'class' => 'form-control')) }}

                @if($errors->first('item'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </div>

        <!-- Submit -->

        <div class="form-group">

          <div class="col-md-12">

            <div class="btns pull-right">

              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>

              @if($equipment->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#equipment" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

              @endif

            </div>  

          </div>

        </div>

        {{ Form::token() }}

      {{ Form::close() }}

    </div><!-- .panel-body -->

  </div><!-- .panel-collapse -->

</div><!-- .panel -->

@endif 

</div><!-- .page-content -->