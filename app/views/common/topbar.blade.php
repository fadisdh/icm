<a href="{{ URL::route('logout') }}" class="part">
	<span class="glyphicon glyphicon-share-alt" area-hidden="true"></span>&nbsp; Logout
</a>

<span class="part">
	Welcome {{ Auth::check() ? Auth::user()->name() : '' }}
</span>