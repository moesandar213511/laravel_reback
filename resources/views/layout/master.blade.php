<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<!--  Using CDN -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

	<!-- Using Precompile boostrap file -->
	<link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
</head>
<body>
	@include('layout.navbar')

	@yield('content')
	
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script> -->

	<!-- Using Precompile boostrap file -->
	<script src="{{ url('/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ url('/js/boostrap.min.js') }}"></script>
</body>
</html>