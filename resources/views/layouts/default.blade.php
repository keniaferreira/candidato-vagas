<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>CPanel</title>
	@include('layouts.css-default')
	<script type="text/javascript" src="{{url('/libs/jquery/jquery-3.6.0.min.js')}}"></script>
	<meta name="robots" content="noindex, nofollow">
</head>
<body>
	@yield('content')

	@include('layouts.html-default')
	@include('layouts.alert')
	@include('layouts.scripts-default')
</body>
</html>