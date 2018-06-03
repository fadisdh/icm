@extends('layout.main')

@section('content')

@parent
<!-- Attachments -->
<script id="tmpl-attachment" type="text/x-jQuery-tmpl">
  <div class="panel panel-default">

    <div class="panel-heading">{{trans('tool.attachment')}} <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

    <div class="panel-body">

      <div class="form-group">

        {{ Form::label('title', trans("tool.title"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('title[]', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.title"))) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('attachment[]', trans("tool.attachment"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::file('attachment[]', null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

    </div><!-- panel-body -->

  </div><!-- panel -->
</script>

{{ Form::model($tool, array('route' => array('tool.save.post', $tool->id ? $tool->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

<nav class="page-actions container-fluid" class="page-actions">

  <div class="row">

    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$tool->id ? 'Edit Tool' : 'New Tool'}}</div>

    <div class="actions col-md-9">

        <div class="btns pull-right">

          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

          <a href="{{URL::route('tools')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

        </div>

    </div>

  </div>

</nav><!-- .actions -->

  <!-- Name -->

	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

		{{ Form::label('name', trans("tool.name"), array('class' => 'col-md-2 control-label')) }}

    	<div class="col-md-10">

  			{{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.name"))); }}

        @if($errors->first('name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

    	</div>

  </div>



  <!-- Arabic name -->

  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name_arabic', trans('tool.name_arabic'), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.name_arabic"))); }}

        @if($errors->first('name_arabic'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- type -->

  <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('type', trans("tool.type"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('type', getLocale() == 'en' ? Config::get('vars/tool_type.en') : Config::get('vars/tool_type.ar'), null, array('class' => 'form-control expandable', 'data-target' => '#type-expandable')) }}

        @if($errors->first('type'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <ul id="type-expandable" class="expandable-wrapper">

    <li id="company_equipment">

      <!-- source -->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('company_equipment', getLocale() == 'ar' ? Config::get('vars/tool_source.ar') : Config::get('vars/tool_source.en'), $tool->source ? $tool->source : null, array('class' => 'form-control')) }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li> 



    <li id="subcontractors_equipment">

      <!-- supplier_name supply_and_install-->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('subcontractors_equipment', Supplier::getSuppliers('supply_and_install'), $tool->source ? $tool->source : null, array('class' => 'form-control')) }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li>



    <li id="equipment_rental">

      <!-- supplier_name equipment_rental-->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("tool.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('equipment_rental', Supplier::getSuppliers('equipment_rental'), $tool->source ? $tool->source : null, array('class' => 'form-control')) }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li>

  </ul>


  <!-- description -->

  <div class="form-group {{ $errors->first('description') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('description', trans('tool.description'), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.description"))); }}

        @if($errors->first('description'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- unit -->

  <div class="form-group {{ $errors->first('unit') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('unit', trans('tool.unit'), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('unit', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), null, array('class' => 'form-control')) }}

        @if($errors->first('unit'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- unit_rate   -->

  <div class="form-group {{ $errors->first('unit_rate') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('unit_rate', trans('tool.unit_rate'), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('unit_rate', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.unit_rate"))); }}

        @if($errors->first('unit_rate'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- quantity   -->

  <div class="form-group {{ $errors->first('quantity') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('quantity', trans('tool.quantity'), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('quantity', null, array('class' => 'form-control', 'placeholder' => trans("tool.placeholder.quantity"))); }}

        @if($errors->first('quantity'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- price_validity From-->

  <div id="price_validity" class="form-group {{ $errors->first('price_validity_from') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('price_validity_from', trans('tool.price_validity_from'), array('class' => 'col-md-2 control-label')) }}

    <div class="col-md-10">

        <?php $date = date('Y-m-d'); ?>

        {{ Form::date('price_validity_from', isset($tool->price_validity_from) ? $tool->price_validity_from : ( Input::old('price_validity_from') ? Input::old('price_validity_from') : $date ), array('class' => 'form-control')) }}

         @if($errors->first('price_validity_from'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

    </div>

  </div>



  <!-- price_validity To-->

  <div id="price_validity" class="form-group {{ $errors->first('price_validity_to') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('price_validity_to', trans('tool.price_validity_to'), array('class' => 'col-md-2 control-label')) }}

    <div class="col-md-10">

        <?php $date = date('Y-m-d'); ?>

        {{ Form::date('price_validity_to', isset($tool->price_validity_to) ? $tool->price_validity_to : ( Input::old('price_validity_to') ? Input::old('price_validity_to') : $date ), array('class' => 'form-control')) }}

         @if($errors->first('price_validity_to'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

    </div>

  </div>



  <!-- Attachment -->
  <div class="form-group {{ $errors->first('attachment') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('attachment', trans("tool.attachments"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="attachment-wrapper" class="attachment-wrapper">

          @if($tool->id)

            @foreach($tool->attachments as $attachment)

              <div class="panel panel-default">

                <div class="panel-heading">Attachment <a href="{{URL::route('attachment.delete', $attachment->id)}}" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('title', trans("tool.title"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('title['.$attachment->id.']', $attachment->id ? $attachment->title : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('attachment', trans("tool.attachment"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-2">

                      <a href="{{ asset($attachment->getFullPath($attachment->id)) }}" target="_blank" title="Get File"><span class="glyphicon glyphicon-cloud-download"></span> {{ trans('common.get_file'). ' ' . trans('tool.attachment') }}</a>

                  </div>

                  <div class="col-md-8">

                    {{ Form::file('attachment['.$attachment->id.']', null, array('class' => 'form-control')) }}

                  </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->

            @endforeach

          @endif

        </div>

        <a href="javascript:void(0);" class="btn more block" data-container="#attachment-wrapper" data-tmpl="#tmpl-attachment"><i class="fa fa-plus"></i> {{trans('common.add_attachment')}}</a>

      </div>

  </div><!-- attachment -->

  <!-- Submit -->

  <div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

        <a href="{{URL::route('tools')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>

	{{ Form::token() }}

{{ Form::close() }}

@stop