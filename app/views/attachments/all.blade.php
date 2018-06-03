@extends('layout.main')


@section('content')
	@parent
	
	<nav class="page-actions container-fluid" class="page-actions">
		<div class="row">
			<div class="title col-md-3"><i class="fa fa-files-o"></i> Attachments</div>
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
		      		<a href="{{URL::route('attachment.save', 0)}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>
		      	</div>
			</div>
		</div>
	</nav><!-- .actions -->

	<div id="page-content" class="page-content">
		<table class="table sortable">
			<thead>
				<tr>
					<th>#</th>
					<th>{{trans('attachment.title')}}</th>
					<th>{{trans('attachment.type')}}</th>
					<th>{{trans('attachment.link')}}</th>
					<th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th>
                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>
					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($attachments as $attachment)
					<tr>
						<td>{{$attachment->id}}</td>
						<td>{{$attachment->title}}</td>
						<td>{{$attachment->type}}</td>
						<td>{{$attachment->link}}</td>
						<td><a href="{{URL::route('attachment.view', $attachment->id)}}" title="{{trans('common.view')}}"><span class="glyphicon glyphicon-eye-open action"></span></a></span></a></td>
		 				<td><a href="{{URL::route('attachment.save', $attachment->id)}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>
						<td><a href="{{URL::route('attachment.delete', $attachment->id)}}" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<?php echo $attachments->links(); ?>

	</div><!-- .page-content -->
@stop