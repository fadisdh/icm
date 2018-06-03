@extends('layout.main')

@section('content')

@parent


{{ Form::model($operation, array('route' => array('tool.operation.save.post', $operation->id ? $operation->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

  <nav class="page-actions container-fluid" class="page-actions">

    <div class="row">

      <div class="title col-md-7"><i class="fa fa-cog"></i> {{ $operation->id ? 'Edit Operation - ' . $operation->date_operation : 'New Operation'}}</div>

      <div class="actions col-md-5">

          <div class="btns pull-right">

            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

            <a href="{{URL::route('tools.operations')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

          </div>

      </div>

    </div>

  </nav><!-- .actions -->

  <!-- tool_name -->

  <div class="form-group">

    {{ Form::label('date_operation', trans("tool.date_operation"), array('class' => 'col-md-2 control-label')) }}

    <div class="col-md-10">

      <?php $date = date('Y-m-d'); ?>

      {{ Form::date('date_operation', isset($operation->date_operation) ? $operation->date_operation : ( Input::old('date_operation') ? Input::old('date_operation') : $date ), array('class' => 'form-control')) }}

    </div>

  </div><!--form-group -->

  <!-- Operation -->

  <div class="form-group {{ $errors->first('operation') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('operation', trans("tool.operation"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('operation', getLocale() == 'en' ? Config::get('vars/tool_operation.en') : Config::get('vars/tool_operation.ar'), null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable')) }}

        @if($errors->first('operation'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  <ul id="type-expandable" class="expandable-wrapper">

    <!-- Out -->

    <li id="out">

      <!-- type -->

      <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('type', trans("tool.type"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('type[out]', getLocale() == 'en' ? Config::get('vars/tool_type.en') : Config::get('vars/tool_type.ar'), $operation->type ? $operation->type: null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable-five')) }}

            @if($errors->first('type'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

      <!-- Source -->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::text("source[out]", $operation->source ? $operation->source : null, array('class' => 'form-control')); }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

      <!-- Receiver -->

      <div class="form-group {{ $errors->first('receiver') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('receiver', trans("tool.receiver"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('receiver[out]', getLocale() == 'ar' ? Config::get('vars/tool_source.tool_operation.ar') : Config::get('vars/tool_source.tool_operation.en'),  $operation->receiver ? $operation->receiver : null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable-four')); }}


            @if($errors->first('receiver'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

      <ul id="type-expandable-four" class="expandable-wrapper">

        <li id="project">

          <!-- Project Locations -->

          <div class="form-group {{ $errors->first('project_location') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('project_location', trans("tool.project_location"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('project_location[out]', getSelect(Project::all()), $operation->project_location ? $operation->project_location : null, array('class' => 'form-control')); }}

                @if($errors->first('project_location'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

      </ul><!-- expandable-three -->

      <ul id="type-expandable-five" class="expandable-wrapper">

        <li id="company_tool">

          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('tool[out_company_tool]', getSelect(Tool::all()) ,$operation->tool_id ? $operation->tool_id : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

        <li id="subcontractors_tool">

          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('tool[out_subcontractors_tool]', $operation->tool_name ? $operation->tool_name : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- quantity -->

          <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('quantity', trans("tool.quantity"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('quantity[out_subcontractors_tool]', $operation->quantity ? $operation->quantity : null, array('class' => 'form-control')) }}

                @if($errors->first('quantity'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

        <li id="tool_rental">

          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('tool[out_tool_rental]', $operation->tool_name ? $operation->tool_name : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>
          
          <!-- quantity -->

          <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('quantity', trans("tool.quantity"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('quantity[out_tool_rental]', $operation->quantity ? $operation->quantity : null, array('class' => 'form-control')) }}

                @if($errors->first('quantity'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

      </ul>

    </li>

    <!-- In -->

    <li id="in">

      <!-- type -->

      <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('type', trans("tool.type"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('type[in]', getLocale() == 'en' ? Config::get('vars/tool_type.en') : Config::get('vars/tool_type.ar'), $operation->type ? $operation->type: null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable-two')) }}

            @if($errors->first('type'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>


      <ul id="type-expandable-two" class="expandable-wrapper">

        <li id="company_tool">

          <!-- source -->

          <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select("source[company_tool]", getLocale() == 'ar' ? Config::get('vars/tool_source.tool_operation.ar') : Config::get('vars/tool_source.tool_operation.en'),  $operation->source ? $operation->source : null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable-three')) }}

                @if($errors->first('source'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <ul id="type-expandable-three" class="expandable-wrapper">

            <li id="project">

              <!-- Project Locations --> <!-- TO DO -->

              <div class="form-group {{ $errors->first('project_location') ? 'has-error has-feedback' : '' }}">

                {{ Form::label('project_location', trans("tool.project_location"), array('class' => 'col-md-2 control-label')) }}

                  <div class="col-md-10">

                    {{ Form::select('project_location[company_tool]', getSelect(Project::all()), $operation->project_location ? $operation->project_location : null, array('class' => 'form-control')); }}

                    @if($errors->first('project_location'))

                      <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                    @endif

                  </div>

              </div>

            </li>

          </ul><!-- expandable-three -->

          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select('tool[in_company_tool]', getSelect(Tool::all()) ,$operation->tool_id ? $operation->tool_id : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- quantity -->

          <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('quantity', trans("tool.quantity"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('quantity[company_tool]', 1, array('disabled' ,'class' => 'form-control')) }}

                @if($errors->first('quantity'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- Receiver -->

          <div class="form-group {{ $errors->first('receiver') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('receiver', trans("tool.receiver"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('receiver[company_tool]', $operation->receiver ? $operation->receiver : null, array('class' => 'form-control')) }}

                @if($errors->first('receiver'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

        <li id="subcontractors_tool">

          <!-- source -->

          <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select("source[subcontractors_tool]", Supplier::getSuppliers('supply_and_install'),  $operation->supplier ? $operation->supplier : null, array('class' => 'form-control')) }}

                @if($errors->first('source'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>


          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('tool[in_subcontractors_tool]', $operation->tool_name ? $operation->tool_name : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- quantity -->

          <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('quantity', trans("tool.quantity"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('quantity[subcontractors_tool]', null, array('class' => 'form-control')) }}

                @if($errors->first('quantity'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- Receiver -->

          <div class="form-group {{ $errors->first('receiver') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('receiver', trans("tool.receiver"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('receiver[subcontractors_tool]', null, array('class' => 'form-control')) }}

                @if($errors->first('receiver'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

        <li id="tool_rental">

          <!-- source -->

          <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::select("source[tool_rental]", Supplier::getSuppliers('tool_rental'),  $operation->supplier ? $operation->supplier : null, array('class' => 'form-control')); }}

                @if($errors->first('source'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- tool -->

          <div class="form-group {{ $errors->first('tool') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('tool', trans("tool.tool"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('tool[in_rental_tool]', $operation->tool_name ? $operation->tool_name : null, array('class' => 'form-control')) }}

                @if($errors->first('tool'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- quantity -->

          <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('quantity', trans("tool.quantity"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('quantity[tool_rental]', null, array('class' => 'form-control')) }}

                @if($errors->first('quantity'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

          <!-- Receiver -->

          <div class="form-group {{ $errors->first('receiver') ? 'has-error has-feedback' : '' }}">

            {{ Form::label('receiver', trans("tool.receiver"), array('class' => 'col-md-2 control-label')) }}

              <div class="col-md-10">

                {{ Form::text('receiver[tool_rental]', null, array('class' => 'form-control')) }}

                @if($errors->first('receiver'))

                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>

                @endif

              </div>

          </div>

        </li>

      </ul><!-- expandable-two -->

    </li>

  </ul><!-- expandable -->


  <!-- condition -->

  <div class="form-group {{ $errors->first('condition') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('condition', trans("tool.condition"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('condition', getLocale() == 'ar' ? Config::get('vars/tool_condition.ar') : Config::get('vars/tool_condition.en'),  $operation->condition ? $operation->condition : null, array('class' => 'form-control')); }}

        @if($errors->first('condition'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  <!-- transportar_name -->

  <div class="form-group {{ $errors->first('transportar_name') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('transportar_name', trans("tool.transportar_name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('transportar_name', null, array('class' => 'form-control')); }}

        @if($errors->first('transportar_name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  
  <!-- receipt -->
  <div class="form-group {{ $errors->first('receipt') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('receipt', trans("tool.receipt"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-2">
        @if($operation->attachments->count())
          <a href="{{ asset($operation->attachments->first()->getFullPath($operation->attachments->first()->id)) }}" target="_blank" title="Get File"><span class="glyphicon glyphicon-cloud-download"></span> {{ trans('common.get_file'). ' ' . trans('operation.receipt') }}</a>
        @else
          {{ trans('common.no_file') }}
        @endif
      </div>
      <div class="col-md-8">
        {{ Form::file('receipt', null, array('class' => 'form-control')); }}
        @if($errors->first('receipt'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>


  <!-- Submit -->

  <div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

        <a href="{{URL::route('tools.operations')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>



  {{ Form::token() }}

  

{{ Form::close() }}

@stop