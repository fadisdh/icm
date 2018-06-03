@extends('layout.main')





@section('content')

	@parent



	<nav class="page-actions container-fluid" class="page-actions">

		<div class="row">

			<div class="title col-md-3"><i class="fa fa-truck"></i> Suppliers</div>

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

		      		<a href="{{ URL::route('supplier.export') }}" class="btn btn-default" title="export"><i class="fa fa-download"></i> Export</a>

		      		<a href="{{ URL::route('supplier.import') }}" class="btn btn-default" title="import"><i class="fa fa-upload"></i> Import</a>

		      		<a href="{{URL::route('supplier.save', 0)}}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>

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

					<th>{{trans('supplier.name')}}</th>

					<th>{{trans('supplier.name_arabic')}}</th>

					{{-- <th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th> --}}

                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>

					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>

				</tr>

			</thead>

			<tbody>

				@foreach($suppliers as $supplier)

					<tr>

						<td>{{$supplier->id}}</td>

						<td>{{$supplier->name}}</td>

						<td>{{$supplier->name_arabic}}</td>

						{{-- <td><a href="{{URL::route('supplier.view', $supplier->id)}}" title="{{trans('common.view')}}"><span class="glyphicon glyphicon-eye-open action"></span></a></span></a></td> --}}

		 				<td><a href="{{URL::route('supplier.save', $supplier->id)}}" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>

						<td><a href="{{URL::route('supplier.delete', $supplier->id)}}" title="{{trans('common.delete')}}" class="delete" data-name="{{$supplier->name}}"><span class="glyphicon glyphicon-trash action"></span></a></td>

					</tr>

				@endforeach

			</tbody>

		</table>



		<?php echo $suppliers->links(); ?>



	</div><!-- .page-content -->

@stop