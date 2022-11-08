<!DOCTYPE html>
<html>

<head>
	@include('layouts.head')
	@yield('head')
</head>

<body class="vertical-layout vertical-menu 2-columns fixed-navbar menu-expanded pace-done" data-open="click" data-menu="vertical-menu" data-col="2-columns">
	<style>
		a,
		input:not(.email),
		label,
		.card-title,
		.breadcrumb,
		td,
		th {
			text-transform: capitalize !important;
		}
	</style>
	<!-- Header -->
	<header>
		@include('layouts.header')
	</header>

	<!-- Sidebar -->
	@include('layouts.sidebar')

	<!-- Content Wrapper. Contains page content -->
	<div class="app-content content">
		<div class="content-wrapper">
			@if (session('status'))
			<div class="alert-message">{{ session('status') }}</div>
			@endif
			<!-- Main content -->
			@yield('content')
			<!-- /.content -->
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer footer-static footer-light navbar-border">
		@include('layouts.footer')
	</footer>

	@include('layouts.scripts')
	@yield('scripts')
</body>

</html>
