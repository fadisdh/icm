@extends('layout.main')

@section('content')

@parent

<!-- Attachments -->
<script id="tmpl-attachment" type="text/x-jQuery-tmpl">
  <div class="panel panel-default">

    <div class="panel-heading">Attachment <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

    <div class="panel-body">

      <div class="form-group">

        {{ Form::label('title', trans("supplier.title"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('title[]', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.title"))) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('attachment[]', trans("supplier.attachment"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::file('attachment[]', null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

    </div><!-- panel-body -->

  </div><!-- panel -->
</script>


<script id="tmpl-price" type="text/x-jQuery-tmpl">

  <div class="panel panel-default">

    <div class="panel-heading">Rate Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

    <div class="panel-body">

      <div class="form-group">

        {{ Form::label('price', trans("equipment.rate"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('price[]', null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('unit', trans("equipment.unit"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::select('unit[]', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), null, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('price_validity_from', trans("equipment.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          <?php $date = date('Y-m-d'); ?>

          {{ Form::date('price_validity_from[]', $date, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

       <div class="form-group">

        {{ Form::label('price_validity_to', trans("equipment.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          <?php $date = date('Y-m-d'); ?>

          {{ Form::date('price_validity_to[]', $date, array('class' => 'form-control')) }}

        </div>

      </div><!--form-group -->

    </div><!-- panel-body -->

  </div><!-- panel -->

</script>



{{ Form::model($equipment, array('route' => array('equipment.save.post', $equipment->id ? $equipment->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

  <nav class="page-actions container-fluid" class="page-actions">

  <div class="row">

    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$equipment->id ? 'Edit Equipment' : 'New Equipment'}}</div>

    <div class="actions col-md-9">

        <div class="btns pull-right">

          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

          <a href="{{URL::route('equipments')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

        </div>

    </div>

  </div>

</nav><!-- .actions -->

  <!-- Name -->

  <div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name', trans("equipment.name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("equipment.placeholder.name"))); }}

        @if($errors->first('name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- name_arabic -->

  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('name_arabic', trans("equipment.name_arabic"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("equipment.placeholder.name_arabic"))); }}

        @if($errors->first('name_arabic'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- type -->

  <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('type', trans("equipment.type"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::select('type', getLocale() == 'en' ? Config::get('vars/equipment_type.en') : Config::get('vars/equipment_type.ar'), null, array('class' => 'form-control  expandable', 'data-target' => '#type-expandable')) }}

        @if($errors->first('type'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <ul id="type-expandable" class="expandable-wrapper">

    <li id="company_equipment">

      <!-- source -->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("equipment.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('company_equipment', getLocale() == 'ar' ? Config::get('vars/equipment_source.ar') : Config::get('vars/equipment_source.en'),  $equipment->source ? $equipment->source : null, array('class' => 'form-control')); }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li>



    <li id="subcontractors_equipment">

      <!-- supplier_name supply_and_install-->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("equipment.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('subcontractors_equipment', Supplier::getSuppliers('supply_and_install'), $equipment->source ? $equipment->source : null, array('class' => 'form-control')); }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li>



    <li id="equipment_rental">

      <!-- supplier_name equipment_rental-->

      <div class="form-group {{ $errors->first('source') ? 'has-error has-feedback' : '' }}">

        {{ Form::label('source', trans("equipment.source"), array('class' => 'col-md-2 control-label')) }}

          <div class="col-md-10">

            {{ Form::select('equipment_rental', Supplier::getSuppliers('equipment_rental'), $equipment->source ? $equipment->source : null, array('class' => 'form-control')); }}

            @if($errors->first('source'))

              <span class="glyphicon glyphicon-remove form-control-feedback"></span>

            @endif

          </div>

      </div>

    </li>

  </ul>

  

  <!-- description -->

  <div class="form-group {{ $errors->first('description') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('description', trans("equipment.description"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => trans("equipment.placeholder.description"))); }}

        @if($errors->first('description'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  <!-- Attachment -->
  <div class="form-group {{ $errors->first('attachment') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('attachment', trans("equipment.attachments"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="attachment-wrapper" class="attachment-wrapper">

          @if($equipment->id)

            @foreach($equipment->attachments as $attachment)

              <div class="panel panel-default">

                <div class="panel-heading">Attachment <a href="{{URL::route('attachment.delete', $attachment->id)}}" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('title', trans("equipment.title"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('title['.$attachment->id.']', $attachment->id ? $attachment->title : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('attachment', trans("supplier.attachment"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-2">

                      <a href="{{ asset($attachment->getFullPath($attachment->id)) }}" target="_blank" title="Get File"><span class="glyphicon glyphicon-cloud-download"></span> {{ trans('common.get_file'). ' ' . trans('supplier.attachment') }}</a>

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

  <!-- price - unit - dates  -->

  <div class="form-group {{ $errors->first('price') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('price', trans("equipment.rate"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="price-wrapper" class="price-wrapper">

          @if($equipment->id && $equipment->prices)

            @foreach($equipment->prices as $price)

              <div class="panel panel-default">

                <div class="panel-heading">Rate Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('price', trans("equipment.rate"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('price['.$price->id.']', $price->id ? $price->price : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('unit', trans("equipment.unit"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::select('unit['.$price->id.']', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), $price->unit ? $price->unit : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('price_validity_from', trans("equipment.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_from['.$price->id.']', isset($price->price_validity_from) ? $price->price_validity_from : ( Input::old('price_validity_from') ? Input::old('price_validity_from') : $date ), array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                   <div class="form-group">

                    {{ Form::label('price_validity_to', trans("equipment.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_to['.$price->id.']', isset($price->price_validity_to) ? $price->price_validity_to : ( Input::old('price_validity_to') ? Input::old('price_validity_to') : $date ), array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->

            @endforeach

          @elseif(Input::old('price[]'))

            <?php
              $prices = Input::old('price[]');
              $units = Input::old('unit[]');
              $froms = Input::old('price_validity_from[]');
              $tos = Input::old('price_validity_to[]');
            ?>

            @foreach($prices as $key => $val)

            <div class="panel panel-default">

                <div class="panel-heading">Rate Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('price', trans("equipment.rate"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('price[]', isset($price[$key]) ? $price[$key] : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('unit', trans("equipment.unit"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::select('unit[]', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), isset($unit[$key]) ? $unit[$key] : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('price_validity_from', trans("equipment.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_from[]', isset($froms[$key]) ? $froms[$key] : $date, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                   <div class="form-group">

                    {{ Form::label('price_validity_to', trans("equipment.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_to[]', isset($tos[$key]) ? $tos[$key] : $date, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->
            @endforeach
          @else

            <div class="panel panel-default">

                <div class="panel-heading">Rate Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('price', trans("equipment.rate"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('price[0]', '', array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('unit', trans("equipment.unit"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::select('unit[0]', App::getLocale() == 'ar' ? Config::get('vars/unit.ar') : Config::get('vars/unit.en'), '', array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('price_validity_from', trans("equipment.price_validity_from"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_from[0]', $date, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                   <div class="form-group">

                    {{ Form::label('price_validity_to', trans("equipment.price_validity_to"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      <?php $date = date('Y-m-d'); ?>

                      {{ Form::date('price_validity_to[0]', $date, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->

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

        <a href="{{URL::route('equipments')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>



  {{ Form::token() }}

  

{{ Form::close() }}

@stop