<!DOCTYPE html>
<html>
<head>
	<title>
		@section('pageTitle')
			{{{ $pageTitle or 'ICM' }}}
		@show
		| ICM
	</title>

	@section('style')
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

		<!-- Bootstrap -->
		{{ HTML::style('assets/vendors/bootstrap/css/bootstrap.min.css') }}
		{{ HTML::style('assets/vendors/bootstrap/css/bootstrap-theme.min.css') }}


		<!-- Font Awesome -->
		{{ HTML::style('assets/vendors/font-awesome/css/font-awesome.min.css') }}

		{{ HTML::style('assets/css/style.css') }}

		<!-- DatePicker -->
        {{ HTML::style('assets/js/vitalets-bootstrap-datepicker/bootstrap-datepicker.min.css') }}

        <!-- ResponsiveCalendar -->
        {{ HTML::style('assets/vendors/responsive-calendar/css/responsive-calendar.css') }}

        <!-- DataTables -->
        {{ HTML::style('//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css') }}
	@show

	@section('script')
		<!-- jQuery -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- jQuery Tmpl -->
		{{ HTML::script('assets/vendors/jquery-tmpl/jquery.tmpl.min.js') }}
		
		<!-- Bootstrap -->
		{{ HTML::script('assets/vendors/bootstrap/js/bootstrap.min.js') }}

		<!-- DatePicker -->
        {{ HTML::script('assets/js/vitalets-bootstrap-datepicker/bootstrap-datepicker.min.js') }}
		
		<!-- ResponsiveCalendar -->
        {{ HTML::script('assets/vendors/responsive-calendar/js/responsive-calendar.min.js') }}

        <!-- DataTables -->
        {{ HTML::script('//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js') }}

		{{ HTML::script('assets/js/main.js') }}
	@show

	@section('inlineStyle')

	@show

	

	@section('inlineScript')

	@show
</head>
<body class="{{{ $pageClass or 'default' }}}">
	@section('main')

	@show
</body>
</html>