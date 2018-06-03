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

        <th>{{trans('report.type')}}</th>

        <th>{{trans('report.name')}}</th>

        <th>{{trans('report.amount')}}</th>

        {{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($violations))

        @foreach($violations as $vio)

          <tr {{ $vio->id == $violation->id ? 'class="selected"' : '' }}>

            <td>{{$vio->id}}</td>

            <td>{{$vio->type}}</td>

            <td>{{$vio->name}}</td>

            <td>{{$vio->amount}}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'violation' => $vio->id)) }}#violation" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

            <td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

          </tr>

        @endforeach

      @else

        <tr>

          <td colspan="6" class="text-center">{{ trans('common.empty') }}</td>

        </tr>

      @endif

      

    </tbody>

  </table>



<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_violation" aria-expanded="true" aria-controls="addnew_violation">

          {{ $violation->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_violation" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">



        {{ Form::model($violation, array('route' => array('report.violation.save.post', $report->id, $violation->id ? $violation->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}



        <!-- description -->

        <div class="form-group {{ $errors->first('description') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('description', trans("report.description"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.description"))) }}

              @if($errors->first('description'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- type -->

        <div class="form-group {{ $errors->first('type') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('type', trans("report.type"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('type', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.type"))) }}

              @if($errors->first('type'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- name -->

        <div class="form-group {{ $errors->first('name') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('name', trans("report.name"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.name"))) }}

              @if($errors->first('name'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- amount -->

        <div class="form-group {{ $errors->first('amount') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('amount', trans("report.amount"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::text('amount', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.amount"))) }}

              @if($errors->first('amount'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- Submit -->

        <div class="form-group">

          <div class="col-md-12">

            <div class="btns pull-right">

              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>

              @if($violation->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#violation" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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