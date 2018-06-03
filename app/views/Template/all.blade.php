@extends('layout.main')


@section('content')
	@parent
	
	<nav class="page-actions" class="page-actions">
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#page-actions-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span> Users</a>
		    </div>

		    <div class="collapse navbar-collapse" id="page-actions-collapse">
		      <ul class="nav navbar-nav">
		        <li><a href="#"><span class="glyphicon glyphicon-plus"></span> {{trans('common.add_new')}}</a></li>
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Actions <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Action 1</a></li>
		            <li><a href="#">Action 2</a></li>
		            <li class="divider"></li>
		            <li><a href="#">Action 3</a></li>
		          </ul>
		        </li>
		      </ul>
		      <form class="navbar-form navbar-right" role="search">
		        <div class="input-group">
			      <input type="text" class="form-control" placeholder="{{trans('common.search_for')}}">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
			      </span>
			    </div><!-- /input-group -->
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		      </ul>
		    </div><!-- .navbar-collapse -->
		  </div><!-- .container-fluid -->
		</nav>
	</nav><!-- .actions -->
	<div id="page-content" class="page-content">
		<table class="table">
			<thead>
				<tr>
					<th>Column 1</th>
					<th class="center">Column 2</th>
					<th class="right">Column 3</th>
					<th>Column 4</th>
					<th width="15"><span class="glyphicon glyphicon-eye-open action"></span></th>
                	<th width="15"><span class="glyphicon glyphicon-edit action"></span></th>
					<th width="15"><span class="glyphicon glyphicon-trash action"></span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Content 1</td>
					<td class="center">Content 2</td>
					<td class="right">Content 3</td>
					<td>Content 4</td>
					<td><a href="" title="{{trans('common.view')}}"><span class="glyphicon glyphicon-eye-open action"></span></a></span></a></td>
	 				<td><a href="" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>
					<td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>
				</tr>
				<tr>
					<td>Content 1</td>
					<td class="center">Content 2</td>
					<td class="right">Content 3</td>
					<td>Content 4</td>
					<td><a href="" title="{{trans('common.view')}}"><span class="glyphicon glyphicon-eye-open action"></span></a></span></a></td>
	 				<td><a href="" title="{{trans('common.edit')}}"><span class="glyphicon glyphicon-edit action"></span></a></td>
					<td><a href="" title="{{trans('common.delete')}}"><span class="glyphicon glyphicon-trash action"></span></a></td>
				</tr>
			</tbody>
		</table>
		
		<nav id="page-pagination" class="page-pagination">
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>

	</div><!-- .page-content -->
@stop