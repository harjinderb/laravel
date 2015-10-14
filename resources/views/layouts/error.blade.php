<!doctype html>
<html>
<head>
	<title>@yield('title')</title>
    @include('layouts.adminHead')
    {!! HTML::style('assets/front/css/style.css') !!}
{!! HTML::style('assets/front/css/responsive.css') !!}
{!! HTML::style('assets/front/css/animate.min.css') !!}
{!! HTML::style('assets/front/css/menu.css') !!}
</head>
<body class="error-body no-top pace-done">
<div class="error-wrapper container">

		@yield('content')


</div>

</body>
</html>
