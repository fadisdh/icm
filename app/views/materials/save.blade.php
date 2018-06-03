@extends('layout.main')

@section('content')

@parent

{{ Form::model($material, array('route' => array('material.save.post', $material->id ? $material->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

  <nav class="page-actions container-fluid" class="page-actions">

    <div class="row">

      <div class="title col-md-3"><i class="fa fa-cog"></i> {{$material->id ? 'Edit Material' : 'New Material'}}</div>

      <div class="actions col-md-9">

          <div class="btns pull-right">

            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

            <a href="{{URL::route('materials')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

          </div>

      </div>

    </div>

  </nav><!-- .actions -->



  <!-- Name -->

	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name', trans("material.name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("material.placeholder.name"))); }}

        @if($errors->first('name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- name_arabic -->

  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name_arabic', trans("material.name_arabic"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("material.placeholder.name_arabic"))); }}

        @if($errors->first('name_arabic'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <div class="form-group {{ $errors->first('supplier_id') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('supplier_id', trans("material.supplier_name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('supplier_id', Supplier::getSuppliers('tme'), $material->supplier_id ? $material->supplier_id : null, array('class' => 'form-control')) }}

        @if($errors->first('supplier'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- country -->

  <div class="form-group {{ $errors->first('country') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('country', trans("material.country"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('country', Config::get('country'), null, array('class' => 'form-control')) }}

        @if($errors->first('country'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- unit -->

  <div class="form-group {{ $errors->first('unit_id') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('unit_id', trans("material.unit"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('unit_id', Unit::getUnits(), $material->unit_id ? $material->unit_id : null, array('class' => 'form-control')) }}

        @if($errors->first('unit_id'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- price -->

  <div class="form-group {{ $errors->first('price') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('price', trans("material.price"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => trans("material.placeholder.price"))); }}

        @if($errors->first('price'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- validity From-->

  <div class="form-group {{ $errors->first('validity_from') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('validity_from', trans("material.validity_from"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <?php $date = date('Y-m-d'); ?>

        {{ Form::date('validity_from', isset($material->validity_from) ? $material->validity_from : ( Input::old('validity_from') ? Input::old('validity_from') : $date ), array('class' => 'form-control')) }}

        @if($errors->first('validity_from'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- validity To-->

  <div class="form-group {{ $errors->first('validity_to') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('validity_to', trans("material.validity_to"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <?php $date = date('Y-m-d'); ?>

        {{ Form::date('validity_to', isset($material->validity_to) ? $material->validity_to : ( Input::old('validity_to') ? Input::old('validity_to') : $date ), array('class' => 'form-control')) }}

        @if($errors->first('validity_to'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- quotation_reference -->

  <div class="form-group {{ $errors->first('quotation_reference') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('quotation_reference', trans("material.quotation_reference"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('quotation_reference', null, array('class' => 'form-control', 'placeholder' => trans("material.placeholder.quotation_reference"))); }}

        @if($errors->first('quotation_reference'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  <!-- quotation_reference attachment -->
  
  <div class="form-group {{ $errors->first('qr_attachment') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('qr_attachment', trans("material.qr_attachment"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-2">
        @if($material->attachments->count())
          <a href="{{ asset($material->attachments->first()->getFullPath($material->attachments->first()->id)) }}" target="_blank" title="Get File"><span class="glyphicon glyphicon-cloud-download"></span> {{ trans('common.get_file'). ' ' . trans('material.qr_attachment') }}</a>
        @else
          {{ trans('common.no_file') }}
        @endif
      </div>
      <div class="col-md-8">
        {{ Form::file('qr_attachment', null, array('class' => 'form-control')); }}
        @if($errors->first('qr_attachment'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>


  <!-- note -->

  <div class="form-group {{ $errors->first('note') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('note', trans("material.note"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => trans("material.placeholder.note"))); }}

        @if($errors->first('note'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- Submit -->

  <div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

        <a href="{{URL::route('materials')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>



	{{ Form::token() }}

  

{{ Form::close() }}

@stop