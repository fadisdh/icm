@extends('layout.main')

@section('content')

@parent

<script id="tmpl-price" type="text/x-jQuery-tmpl">

  <div class="panel panel-default">

    <div class="panel-heading">{{trans('labor.rate_info')}} <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

    <div class="panel-body">

      <div class="form-group">

        {{ Form::label('price', trans("labor.rate"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('price[]', null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('unit', trans("labor.unit"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::select('unit[]', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('price_validity_from', trans("labor.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          <?php $date = date('Y-m-d'); ?>

          {{ Form::date('price_validity_from[]', $date, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

       <div class="form-group">

        {{ Form::label('price_validity_to', trans("labor.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          <?php $date = date('Y-m-d'); ?>

          {{ Form::date('price_validity_to[]', $date, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

    </div><!-- panel-body -->

  </div><!-- panel -->

</script>

{{ Form::model($labor, array('route' => array('labor.save.post', $labor->id ? $labor->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}



  <nav class="page-actions container-fluid" class="page-actions">

  <div class="row">

    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$labor->id ? 'Edit Labor' : 'New Labor'}}</div>

    <div class="actions col-md-9">

        <div class="btns pull-right">

          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

          <a href="{{URL::route('labors')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

        </div>

    </div>

  </div>

</nav><!-- .actions -->



  <!-- Name -->

	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name', trans("labor.name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("labor.placeholder.name"))); }}

        @if($errors->first('name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- Arabic Name -->

  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name_arabic', trans("labor.name_arabic"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("labor.placeholder.name_arabic"))); }}

        @if($errors->first('name_arabic'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- nationality -->

  <div class="form-group {{ $errors->first('nationality') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('nationality', trans("labor.nationality"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('nationality', Config::get('country'), null, array('class' => 'form-control')) }}

        @if($errors->first('nationality'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- occupation -->

  <div class="form-group {{ $errors->first('occupation') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('occupation', trans("labor.occupation"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('occupation', Occupation::getOccupations(), $labor->occupation ? $labor->occupation->id : null, array('class' => 'form-control')) }}

        @if($errors->first('occupation'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- residency_type -->

  <div class="form-group {{ $errors->first('residency_type') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('residency_type', trans("labor.residency_type"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('residency_type', App::getLocale() == 'en' ? Config::get('vars/residency_type.en') : Config::get('vars/residency_type.ar'), null, array('class' => 'form-control')) }}

        @if($errors->first('residency_type'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- civil_id -->

  <div class="form-group {{ $errors->first('civil_id') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('civil_id', trans("labor.civil_id"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('civil_id', null, array('class' => 'form-control', 'placeholder' => trans("labor.placeholder.civil_id"))); }}

        @if($errors->first('civil_id'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- phone -->

  <div class="form-group {{ $errors->first('phone') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('phone', trans("labor.phone"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('phone', null, array('class' => 'form-control', 'placeholder' => trans("labor.placeholder.phone"))); }}

        @if($errors->first('phone'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- note -->

  <div class="form-group {{ $errors->first('note') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('note', trans("labor.note"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => trans("labor.placeholder.note"))); }}

        @if($errors->first('note'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>


  <!-- civil_id image -->
  <div class="form-group {{ $errors->first('civil_id') ? 'has-error has-feedback' : '' }}">
    {{ Form::label('civil_id', trans("labor.civil_id"), array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-2">
        @if($labor->attachments->count())
          <a href="{{ asset($labor->attachments->first()->getFullPath($labor->attachments->first()->id)) }}" target="_blank" title="Get File"><span class="glyphicon glyphicon-cloud-download"></span> {{ trans('common.get_file'). ' ' . trans('labor.civil_id') }}</a>
        @else
          {{ trans('common.no_file') }}
        @endif
      </div>
      <div class="col-md-8">
        {{ Form::file('civil_id', null, array('class' => 'form-control')); }}
        @if($errors->first('civil_id'))
          <span class="glyphicon glyphicon-remove form-control-feedback"></span>
        @endif
      </div>
  </div>


  <!-- price - unit - dates  -->

  <div class="form-group {{ $errors->first('price') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('price', trans("labor.rates"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="price-wrapper" class="price-wrapper">

          @if($labor->id)

            @foreach($labor->prices as $price)

              <div class="panel panel-default">

                <div class="panel-heading">{{trans('labor.rate_info')}} <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('price', trans("labor.rate"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('price['.$price->id.']', $price->id ? $price->price : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('unit', trans("labor.unit"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::select('unit['.$price->id.']', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), $price->unit ? $price->unit : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('price_validity_from', trans("labor.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_from['.$price->id.']', isset($price->price_validity_from) ? $price->price_validity_from : ( Input::old('price_validity_from') ? Input::old('price_validity_from') : $date ), array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                   <div class="form-group">

                    {{ Form::label('price_validity_to', trans("labor.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_to['.$price->id.']', isset($price->price_validity_to) ? $price->price_validity_to : ( Input::old('price_validity_to') ? Input::old('price_validity_to') : $date ), array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->

            @endforeach

          @endif

        </div>

        <a href="javascript:void(0);" class="btn more block" data-container="#price-wrapper" data-tmpl="#tmpl-price"><i class="fa fa-plus"></i> {{trans('common.add')}}</a>

        @if($errors->first('price'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>


  <!-- Submit -->

  <div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

        <a href="{{URL::route('labors')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>



	{{ Form::token() }}

  

{{ Form::close() }}

@stop