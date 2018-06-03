@extends('layout.main')

@section('content')

	@parent

	<nav class="page-actions container-fluid" class="page-actions">

		<div class="row">

			<div class="title col-md-4"><i class="fa fa-cog"></i> Tools Operations</div>

			<div class="actions col-md-8">

				<form class="pull-right" role="search">

		        	<div class="input-group">

			      		<input type="text" class="form-control" placeholder="{{trans('common.search_for')}}">

			      		<span class="input-group-btn">

			        		<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>

			      		</span>

			    	</div>

		      	</form>

		      	<div class="btns pull-right">

		      		<a href="{{URL::route('tool.operation.save', 0)}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>

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

		<table class="table sortable">

			<thead>

				<tr>

					<th>#</th>

					<th>{{trans('tool.type')}}</th>

					<th>{{trans('tool.operation')}}</th>

					<th>{{trans('tool.date_operation')}}</th>

                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

				</tr>

			</thead>

			<tbody>

				@foreach($operations as $operation)

					<tr>

						<td>{{$operation->id}}</td>

						<td>{{Config::get('vars/tool_type.en.'.$operation->type)}}</td>

						<td>{{$operation->operation}}</td>

						<td>{{$operation->date_operation}}</td>

		 				<td><a href="{{ URL::route('tool.operation.save', $operation->id)  }}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

						<td><a href="{{URL::route('tool.operation.delete', $operation->id)}}" title="{{trans('common.delete')}}" class="delete" data-name="{{$operation->id}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

					</tr>

				@endforeach

			</tbody>

		</table>

		<?php echo $operations->links(); ?>

	</div><!-- .page-content -->

@stop