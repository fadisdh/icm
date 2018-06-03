@extends('layout.main')





@section('content')

	@parent



	<nav class="page-actions container-fluid" class="page-actions">

		<div class="row">

			<div class="title col-md-6"><i class="fa fa-tasks"></i> {{ $project->name }}/Reports</div>

			<div class="actions col-md-6">

				<form class="pull-right" role="search">

		        	<div class="input-group">

			      		<input type="text" class="form-control" placeholder="{{trans('common.search_for')}}">

			      		<span class="input-group-btn">

			        		<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

			      		</span>

			    	</div>

		      	</form>

		      	<a href="{{ URL::route('project.report.add', array('id' => 0, 'projectId' => $project->id)) }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> ADD NEW</a>

			</div>

		</div>

	</nav><!-- .actions -->



	

	<!-- Message -->

	@if(Session::has('action'))

		<div class="alert {{ Session::get('result') ? 'alert-info' : 'alert-danger' }}">

			{{ Session::get('message') }}

			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		</div>

	@endif

	

	<div id="page-content" class="page-content">

		<table class="table">

			<thead>

				<tr>

					<th>#</th>

					<th>{{trans('report.date')}}</th>

					{{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

				</tr>

			</thead>

			<tbody>

				@foreach($reports as $report)

					<tr>

						<td>{{$report->id}}</td>

						<td>{{$report->date}}</td>

		 				<td><a href="{{URL::route('project.report.save', $report->id)}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

						<td><a href="{{URL::route('project.report.delete', $report->id)}}" title="{{trans('common.delete')}}"  class="delete" data-name="{{$report->id}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

					</tr>

				@endforeach

			</tbody>

		</table>



		<?php echo $reports->links(); ?>



	</div><!-- .page-content -->

@stop