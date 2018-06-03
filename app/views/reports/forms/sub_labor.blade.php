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

        <th>{{trans('report.sub')}}</th>

        <th>{{trans('report.num_labors')}}</th>

        <th>{{trans('report.skill')}}</th>

        {{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($subLabors))

        @foreach($subLabors as $labor)

          <tr {{ $labor->id == $subLabor->id ? 'class="selected"' : '' }}>

            <td>{{$labor->id}}</td>

            <td>{{$labor->supplier->name}}</td>

            <td>{{$labor->num_labors}}</td>

            <td>{{$labor->occupation->name}}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'sub_labor' => $labor->id)) }}#sub_labor" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

            <td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

          </tr>

        @endforeach

      @else

        <tr>

          <td colspan="7" class="text-center">{{ trans('common.empty') }}</td>

        </tr>

      @endif

      

    </tbody>

  </table>





<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_sub_labor" aria-expanded="true" aria-controls="addnew_sub_labor">

          {{ $subLabor->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_sub_labor" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">

        {{ Form::model($subLabor, array('route' => array('report.sublabors.save.post', $report->id, $subLabor->id ? $subLabor->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}



        <!-- Sub -->

        <div class="form-group {{ $errors->first('supplier_id') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('supplier_id', trans("report.sub"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('supplier_id', Supplier::getSuppliers('supply_and_install'), $subLabor->supplier_id ? $subLabor->supplier_id : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.supplier_id"))) }}

              @if($errors->first('supplier_id'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- num_labors -->

        <div class="form-group {{ $errors->first('num_labors') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('num_labors', trans("report.num_labors"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('num_labors', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.num_labors"))) }}

              @if($errors->first('num_labors'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- skill -->

        <div class="form-group {{ $errors->first('skill') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('skill', trans("report.skill"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('skill', Occupation::getOccupations(),  $subLabor->skill ? $subLabor->skill : null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.skill"))) }}

              @if($errors->first('skill'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- Number of items -->

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
              @if($subLabor->dsi)
                <?php $i = 0; ?>
                @foreach(json_decode($subLabor->dsi) as $data)
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

              @if($subLabor->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#sub_labor" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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