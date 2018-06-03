@extends('layout.main')

@section('content')

@parent

<!-- Attachments -->
<script id="tmpl-attachment" type="text/x-jQuery-tmpl">
  <div class="panel panel-default">

    <div class="panel-heading">{{trans('tool.attachment')}} <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

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


<!-- Contact Info -->
<script id="tmpl-contact_person" type="text/x-jQuery-tmpl">

  <div class="panel panel-default">

    <div class="panel-heading">Contact Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

    <div class="panel-body">

      <div class="form-group">

        {{ Form::label('contact_person[]', trans("supplier.contact_person"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('contact_person[]', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.contact_person"))) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('phone', trans("supplier.phone"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('phone[]', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.phone"))) }}

        </div>

      </div><!--form-group -->

      <div class="form-group">

        {{ Form::label('fax', trans("supplier.fax"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          {{ Form::text('fax[]', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.fax"))) }}

        </div>

      </div><!--form-group -->

       <div class="form-group">

        {{ Form::label('email', trans("supplier.email"), array('class' => 'col-md-2 control-label')) }}

        <div class="col-md-10">

          <?php $date = date('Y-m-d'); ?>

          {{ Form::text('email[]', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.email"))) }}

        </div>

      </div><!--form-group -->

    </div><!-- panel-body -->

  </div><!-- panel -->

</script>



{{ Form::model($supplier, array('route' => array('supplier.save.post', $supplier->id ? $supplier->id : 0), 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}

  <nav class="page-actions container-fluid" class="page-actions">

  <div class="row">

    <div class="title col-md-3"><i class="fa fa-cog"></i> {{$supplier->id ? 'Edit Supplier' : 'New Supplier'}}</div>

    <div class="actions col-md-9">

        <div class="btns pull-right">

          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

          <a href="{{URL::route('suppliers')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

        </div>

    </div>

  </div>

</nav><!-- .actions -->

  

  <!-- Name -->

	<div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('Name', trans("supplier.name"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.name"))); }}

        @if($errors->first('name'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- Arabic Name -->

  <div class="form-group {{ $errors->first('name_arabic') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('Name', trans("supplier.name_arabic"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ Form::text('name_arabic', null, array('class' => 'form-control', 'placeholder' => trans("supplier.placeholder.name_arabic"))); }}

        @if($errors->first('name_arabic'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>



  <!-- type -->

  <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('type', trans("supplier.type"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        {{ getCheckboxes('vars/supplier_type.en', 'type[]', '')  }}

        @if($errors->first('type'))

          <span class="glyphicon glyphicon-remove form-control-feedback"></span>

        @endif

      </div>

  </div>

  <!-- Attachment -->
  <div class="form-group {{ $errors->first('attachment') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('attachment', trans("supplier.attachments"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="attachment-wrapper" class="attachment-wrapper">

          @if($supplier->id)

            @foreach($supplier->attachments as $attachment)

              <div class="panel panel-default">

                <div class="panel-heading">Attachment <a href="{{URL::route('attachment.delete', $attachment->id)}}" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('title', trans("supplier.title"), array('class' => 'col-md-2 control-label')) }}

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


  <!-- Contact Person -->

  <div class="form-group {{ $errors->first('contact_person') ? 'has-error has-feedback' : '' }}">

    {{ Form::label('contact_person', trans("supplier.contact_person"), array('class' => 'col-md-2 control-label')) }}

      <div class="col-md-10">

        <div id="contact_person-wrapper" class="contact_person-wrapper">

          @if($supplier->id)

            @foreach($supplier->contact_persons as $contact_person)

              <div class="panel panel-default">

                <div class="panel-heading">Contact Info <a href="#" class="pull-right more-remove" type="button"><i class="fa fa-times"></i></a></div>

                <div class="panel-body">

                  <div class="form-group">

                    {{ Form::label('contact_person', trans("supplier.contact_person"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('contact_person['.$contact_person->id.']', $contact_person->id ? $contact_person->name : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('phone', trans("supplier.phone"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('phone['.$contact_person->id.']', $contact_person->id ? $contact_person->phone : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                  <div class="form-group">

                    {{ Form::label('fax', trans("supplier.fax"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('fax['.$contact_person->id.']', $contact_person->id ? $contact_person->fax : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                   <div class="form-group">

                    {{ Form::label('email', trans("supplier.email"), array('class' => 'col-md-2 control-label')) }}

                    <div class="col-md-10">

                      {{ Form::text('email['.$contact_person->id.']', $contact_person->id ? $contact_person->email : null, array('class' => 'form-control')) }}

                    </div>

                  </div><!--form-group -->

                </div><!-- panel-body -->

              </div><!-- panel -->

            @endforeach

          @endif

        </div>

        <a href="javascript:void(0);" class="btn more block" data-container="#contact_person-wrapper" data-tmpl="#tmpl-contact_person"><i class="fa fa-plus"></i> {{trans('common.add')}}</a>

      </div>

  </div><!-- Contact Person -->


  <!-- Submit -->

  <div class="form-group">

    <div class="col-md-12">

      <div class="btns pull-right">

        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> SAVE</button>

        <a href="{{URL::route('suppliers')}}" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL</a>

      </div>  

    </div>

  </div>



	{{ Form::token() }}

  

{{ Form::close() }}

@stop