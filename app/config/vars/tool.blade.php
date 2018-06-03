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

        <th>{{trans('report.dsi')}}</th>

        <th>{{trans('report.tool')}}</th>

        <th>{{trans('report.type')}}</th>

        <th>{{trans('report.source')}}</th>

        <th>{{trans('report.quantity')}}</th>

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($tools))

        @foreach($tools as $tool)

          <tr {{ $tool->id == $tool->id ? 'class="selected"' : '' }}>

            <td>{{ $tool->id }}</td>

            <td>{{ $tool->division ? $tool->getDSI() : 'Not Defined' }}</td>

            <td>{{ $tool->type == 'company_tool' ? $tool->tool->name : $tool->tool_name }}</td>

            <td>{{ Config::get('\vars\tool_type.en.'. $tool->type) }}</td>

            <td>{{ $tool->source }}</td>

            <td>{{ $tool->quantity }}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'tool' => $tool->id)) }}#tool" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

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

@if($tool->id)

<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_tool" aria-expanded="true" aria-controls="addnew_tool">

          {{ $tool->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_tool" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">



        {{ Form::model($tool, array('route' => array('report.tool.save.post', $report->id, $tool->id ? $tool->id : 0, $tool->tool_id), 'class' => 'form-horizontal', 'role' => 'form')) }}


        <!-- used -->

        <div class="form-group {{ $errors->first('used') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('used', trans("report.used"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('used', Config::get('vars/tool_used.en'), $tool->used ? $tool->used : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.used"))) }}

              @if($errors->first('used'))

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

                {{ Form::select('division', array(), null, array('id' => 'divisions', 'data-val' => $tool->division_id, 'data-url' => URL::route('json.divisions', $report->project_id), 'class' => 'form-control')) }}

                @if($errors->first('division'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>



          <!-- Sections -->

          <div class="form-group {{ $errors->first('section') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('section', trans("report.section"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('section', array(0 => 'Fill Division First'), null, array('id' => 'sections', 'data-val' => $tool->section_id, 'data-url' => URL::route('json.sections', $report->project_id), 'class' => 'form-control')) }}

                @if($errors->first('section'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>



          <!-- Items -->

          <div class="form-group {{ $errors->first('item') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('item', trans("report.item"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('item', array(0 => 'Fill Section First'), null, array('id' => 'items', 'data-val' => $tool->item_id, 'data-url' => URL::route('json.items', $report->project_id), 'class' => 'form-control')) }}

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

              @if($tool->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#tool" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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