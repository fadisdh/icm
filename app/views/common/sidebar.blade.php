<a href="#" class="logo"><img src="{{ asset('assets/images/logo.png') }}"></a>

<nav class="menu">

	<ul>

		<li><a href="{{URL::route('home')}}"><i class="fa fa-lg fa-home" area-hidden="true"></i>&nbsp; Home Page</a></li>

		<li><a href="{{URL::route('projects')}}"><i class="fa fa-lg fa-cog" area-hidden="true"></i>&nbsp; Projects</a></li>

		{{-- <li><a href="{{URL::route('attachments')}}"><i class="fa fa-lg fa-files-o" area-hidden="true"></i>&nbsp; Attachments</a></li> --}}

		<li><a href="{{URL::route('equipments')}}"><i class="fa fa-lg fa-cog" area-hidden="true"></i>&nbsp; Equipments</a></li>

		<li><a href="{{URL::route('equipments.operations')}}"><i class="fa fa-lg fa-cog" area-hidden="true"></i>&nbsp; Equipments Operations</a></li>

		<li><a href="{{URL::route('labors')}}"><i class="fa fa-lg fa-users" area-hidden="true"></i>&nbsp; Labors</a></li>

		<li><a href="{{URL::route('materials')}}"><i class="fa fa-lg fa-cubes" area-hidden="true"></i>&nbsp; Materials</a></li>

		<li><a href="{{URL::route('occupations')}}"><i class="fa fa-lg fa-suitcase" area-hidden="true"></i>&nbsp; Occupations</a></li>

		<li><a href="{{URL::route('suppliers')}}"><i class="fa fa-lg fa-truck" area-hidden="true"></i>&nbsp; Suppliers</a></li>

		<li><a href="{{URL::route('tools')}}"><i class="fa fa-lg fa-wrench" area-hidden="true"></i>&nbsp; Tools</a></li>

		<li><a href="{{URL::route('tools.operations')}}"><i class="fa fa-lg fa-cog" area-hidden="true"></i>&nbsp; Tools Operations</a></li>

		<li><a href="{{URL::route('units')}}"><i class="fa fa-lg fa-arrows-alt" area-hidden="true"></i>&nbsp; Units</a></li>

		<li><a href="{{URL::route('users')}}"><i class="fa fa-lg fa-user" area-hidden="true"></i>&nbsp; System Users</a></li>

		<li><a href="{{URL::route('roles')}}"><i class="fa fa-lg fa-sitemap" area-hidden="true"></i>&nbsp; Roles</a></li>

	</ul>

</nav>