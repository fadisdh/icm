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

        <th>{{trans('report.supplier')}}</th>

        <th>{{trans('report.material')}}</th>

        <th>{{trans('report.unit')}}</th>

        <th>{{trans('report.quantity')}}</th>

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($subMaterials))

        @foreach($subMaterials as $sm)

          <tr {{ $sm->id == $subMaterial->id ? 'class="selected"' : '' }}>

            <td>{{$sm->id}}</td>

            <td>{{$sm->supplier->name}}</td>

            <td>{{$sm->material}}</td>

            <td>{{$sm->unit->name}}</td>

            <td>{{$sm->quantity}}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'sub_material' => $sm->id)) }}#sub_material" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

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





<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_sub_material" aria-expanded="true" aria-controls="addnew_sub_material">

          {{ $subMaterial->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_sub_material" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">

        {{ Form::model($subMaterial, array('route' => array('report.sub.materials.save.post', $report->id, $subMaterial->id ? $subMaterial->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}



        <!-- Supplier TME-->

        <div class="form-group {{ $errors->first('supplier_id') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('supplier_id', trans("report.supplier"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('supplier_id', Supplier::getSuppliers('supply_and_install'), $subMaterial->supplier_id ? $subMaterial->supplier_id : null, array('class' => 'form-control')) }}

              @if($errors->first('supplier_id'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

             </div>

        </div>



        <!-- Material -->

        <div class="form-group {{ $errors->first('material') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('material', trans("report.material"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{-- {{ Form::select('material_id', Material::getMaterials(), $subMaterial->material_id ? $subMaterial->material_id : null, array('class' => 'form-control')) }} --}}

              {{ Form::text('material', null,  array('class' => 'form-control', 'placeholder' => trans("report.placeholder.material")))}}

              @if($errors->first('material'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

             </div>

        </div>



        <!-- Unit-->

        <div class="form-group {{ $errors->first('unit_id') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('unit_id', trans("report.unit"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('unit_id', Unit::getUnits(), $subMaterial->unit_id ? $subMaterial->unit_id : null, array('class' => 'form-control')) }}

              @if($errors->first('unit_id'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

             </div>

        </div>



        <!-- Quantity -->

        <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('quantity', trans("report.quantity"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.quantity"))) }}

              @if($errors->first('quantity'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- Receipt Reference -->

        <div class="form-group {{ $errors->first('receipt_ref') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('receipt_ref', trans("report.receipt_ref"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('receipt_ref', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.receipt_ref"))) }}

              @if($errors->first('receipt_ref'))

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
              @if($subMaterial->dsi)
                <?php $i = 0; ?>
                @foreach(json_decode($subMaterial->dsi) as $data)
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

              @if($subMaterial->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#sub_material" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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