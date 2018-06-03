@extends('layout.main')





@section('content')

	@parent



	<nav class="page-actions container-fluid" class="page-actions">

		<div class="row">

			<div class="title col-md-3"><i class="fa fa-cubes"></i> Projects</div>

			<div class="actions col-md-9">

				<form class="pull-right" role="search">

		        	<div class="input-group">

			      		<input type="text" class="form-control" placeholder="{{trans('common.search_for')}}">

			      		<span class="input-group-btn">

			        		<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

			      		</span>

			    	</div>

		      	</form>

		      	<div class="btns pull-right">

		      		<a href="{{ URL::route('project.export') }}" class="btn btn-default" title="export"><i class="fa fa-download"></i> Export</a>

		      		<a href="{{ URL::route('project.import') }}" class="btn btn-default" title="import"><i class="fa fa-upload"></i> Import</a>

		      		<a href="{{URL::route('project.save', 0)}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>

		      	</div>

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

		<div class="projects row">
			@foreach($projects as $project)
				<div class="col-md-3">
					<div class="project">
						<div class="img"><img src="{{ asset('assets/images/login-bg.jpg') }}" alt=""></div>
						<div class="title">{{ $project->name }}</div>
						<div class="date">{{ $project->date }}</div>
						<div class="description">{{ $project->description }}</div>
						<div class="actions clearfix">
							<a href="{{URL::route('project.reports', $project->id)}}" title="{{trans('common.view_reports')}}"><span class="glyphicon glyphicon-tasks action"></span></a>
							<a href="{{URL::route('project.report.add', array(0, $project->id))}}" title="{{trans('common.add_report')}}"><span class="glyphicon glyphicon-plus action"></span></a>
							<a href="{{URL::route('project.save', $project->id)}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a>
							<a href="{{URL::route('project.delete', $project->id)}}" title="{{trans('common.delete')}}" class="delete" data-name="{{$project->name}}"><span class="glyphicon glyphicon-trash action"></span></a>
						</div>
					</div><!-- .project -->
				</div><!-- .col-md-4 -->
			@endforeach
		</div><!-- .porjects -->

		

		<?php echo $projects->links(); ?>



	</div><!-- .page-content -->

@stop