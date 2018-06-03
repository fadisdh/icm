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

        <th>{{trans('report.note')}}</th>

        {{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

        <th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

        <th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

      </tr>

    </thead>

    <tbody>

      @if(!empty($notes))

        @foreach($notes as $n)

          <tr {{ $n->id == $note->id ? 'class="selected"' : '' }}>

            <td>{{$n->id}}</td>

            <td>{{$n->note}}</td>

            <td><a href="{{URL::route('project.report.save', array('id' => $report->id, 'note' => $n->id)) }}#note" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

            <td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

          </tr>

        @endforeach

      @else

        <tr>

          <td colspan="4" class="text-center">{{ trans('common.empty') }}</td>

        </tr>

      @endif

      

    </tbody>

  </table>



<div class="panel panel-default save-form">

    <div class="panel-heading" role="tab" id="headingTwo">

      <h4 class="panel-title">

        <a class="collapsed" data-toggle="collapse" href="#addnew_note" aria-expanded="true" aria-controls="addnew_note">

          {{ $note->id ? '<i class="fa fa-edit"></i> EDIT' : '<i class="fa fa-plus"></i> ADD NEW' }}

        </a>

      </h4>

    </div>

    <div id="addnew_note" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">

      <div class="panel-body">



        {{ Form::model($note, array('route' => array('report.note.save.post', $report->id, $note->id ? $note->id : 0), 'class' => 'form-horizontal', 'role' => 'form')) }}



        <!-- note -->

        <div class="form-group {{ $errors->first('note') ? 'has-error has-feedback' : '' }}">

          {{ Form::label('note', trans("report.note"), array('class' => 'col-md-2 control-label')) }}

            <div class="col-md-10">

              {{ Form::textarea('note', null, array('class' => 'form-control', 'placeholder' => trans("report.placeholder.note"))) }}

              @if($errors->first('note'))

                <span class="glyphicon glyphicon-remove form-control-feedback"></span>

              @endif

            </div>

        </div>



        <!-- Submit -->

        <div class="form-group">

          <div class="col-md-12">

            <div class="btns pull-right">

              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{trans('common.save')}}</button>

              @if($note->id)

                <a href="{{ URL::route('project.report.save', $report->id) }}#note" class="btn btn-danger"><i class="fa fa-times"></i> Cancel Edit</a>

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