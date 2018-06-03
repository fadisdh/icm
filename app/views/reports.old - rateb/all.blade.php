@extends('layout.main')


@section('content')
	@parent

	<nav class="page-actions container-fluid" class="page-actions">
		<div class="row">
			<div class="title col-md-3"><i class="fa fa-tasks"></i> Reports</div>
			<div class="actions col-md-9">
				<form class="pull-right" role="search">
		        	<div class="input-group">
			      		<input type="text" class="form-control" placeholder="{{trans('common.search_for')}}">
			      		<span class="input-group-btn">
			        		<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
			      		</span>
			    	</div>
		      	</form>
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
					<th width="15"><span class="fa fa-building action"></span></th>
					<th width="15"><span class="fa fa-users action"></span></th>
                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>
					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>
				</tr>
			</thead>
			<tbody>
				@foreach($reports as $report)
					<tr>
						<td>{{$report->id}}</td>
						<td>{{$report->date}}</td>
						{{-- <td><a href="{{URL::route('project.view', $project->id)}}" title="{{trans('common.view')}}"><span class="glyphicon glyphicon-eye-open action"></span></a></span></a></td> --}}
						<td><a href="{{URL::route('report.sitestaffs.save', $report->id)}}" title="{{trans('report.sitestaffs')}}"><span class="fa fa-building action"></span></a></td>
						<td><a href="{{URL::route('report.sitestaffs.save', $report->id)}}" title="{{trans('report.labors')}}"><span class="fa fa-users action"></span></a></td>
		 				<td><a href="{{URL::route('project.report.save', array($report->id, $projectId))}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>
						<td><a href="{{URL::route('project.report.delete', $report->id)}}" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<?php echo $reports->links(); ?>

	</div><!-- .page-content -->
@stop