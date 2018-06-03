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

        <th>{{trans('report.receipt_type')}}</th>

        <th>{{trans('report.supplier')}}</th>

        <th>{{trans('report.receipt_ref')}}</th>

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($companyMaterials))

        @foreach($companyMaterials as $cm)

          <tr {{ $cm->id == $companyMaterial->id ? 'class="selected"' : '' }}>

            <td>{{$cm->id}}</td>

            <td>{{$cm->receipt_type}}</td>

            <td>{{$cm->supplier->name}}</td>

            <td>{{$cm->receipt_ref}}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'company_material' => $cm->id)) }}#company_material" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

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

        <a class="collapsed" data-toggle="collapse" href="#addnew_company_material" aria-expanded="true" aria-controls="addnew_company_material">

          {{ $companyMaterial->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_company_material" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">  

        {{ Form::model($companyMaterial, array('route' => array('report.company.materials.save.post', $report->id, $companyMaterial->id ? $companyMaterial->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}

        <!-- receipt_type -->

        <div class="form-group {{ $errors->first('receipt_type') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('receipt_type', trans("report.receipt_type"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::select('receipt_type', Config::get('vars/receipt_type.en'), $companyMaterial->receipt_type ? $companyMaterial->receipt_type : null, array('class' => 'form-control expandable', 'data-target' => '#receipt-expandable')) }}

              @if($errors->first('receipt_type'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <ul id="receipt-expandable" class="expandable-wrapper">

          <li id="receipt">

            <!-- Supplier TME-->

            <div class="form-group {{ $errors->first('receipt_supplier_id') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('receipt_supplier_id', trans("report.supplier"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  {{ Form::select('receipt_supplier_id', Supplier::getSuppliers('tme'), $companyMaterial->supplier_id ? $companyMaterial->supplier_id : null, array('class' => 'selector form-control', 'data-target' => '#supplier-materials')) }}

                  @if($errors->first('receipt_supplier_id'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>



            <!-- Material -->

            <div class="form-group {{ $errors->first('material_id') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('material_id', trans("material.material"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  <select name="material_id" id="supplier-materials" data-url="{{ URL::route('json.materials') }}" class="form-control" data-target="#material-unit,#material-unit-price" data-val='{{$companyMaterial->material_id}}'></select>

                  @if($errors->first('material_id'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>

          </li>



          <li id="bills">

            <!-- Supplier supplier_bill_type-->

            <div class="form-group {{ $errors->first('bill_supplier_id') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('bill_supplier_id', trans("report.supplier"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  {{ Form::select('bill_supplier_id', Supplier::getSuppliers('supplier_bill_type'), $companyMaterial->supplier_id ? $companyMaterial->supplier_id : null, array('class' => 'form-control')) }}

                  @if($errors->first('bill_supplier_id'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>



            <!-- Materials -->

            <div class="form-group {{ $errors->first('material') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('material', trans("material.material"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  {{ Form::text('material', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.material"))) }}

                  @if($errors->first('material'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>



            <!-- Unit -->

            <div class="form-group {{ $errors->first('bill_unit_id') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('bill_unit_id', trans("material.unit"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  {{ Form::select('bill_unit_id', Unit::getUnits(), $companyMaterial->unit_id ? $companyMaterial->unit_id : null, array('class' => 'form-control')) }}

                  @if($errors->first('bill_unit_id'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>



            <!-- Unit Price -->

            <div class="form-group {{ $errors->first('unit_price') ? 'has-error has-feedback' : '' }}">

              {{ Form::label('unit_price', trans("report.unit_price"), array('class' => 'col-md-2 control-label')) }}

                <div class="col-md-10">

                  {{ Form::text('unit_price', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.unit_price"))) }}

                  @if($errors->first('unit_price'))

                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                  @endif

                </div>

            </div>

        </ul>



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
              @if($companyMaterial->dsi)
                <?php $i = 0; ?>
                @foreach(json_decode($companyMaterial->dsi) as $data)
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

              @if($companyMaterial->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#company_material" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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