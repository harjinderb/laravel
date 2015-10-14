@yield('adminHead')
<!-- BEGIN BODY -->
<body class="">
	@include('layouts.adminHeader')

<div class="page-container row-fluid">
	
	@include('layouts.adminSidebar')
	 
	@yield('content')
	
	@include('layouts.adminChat')
</div>
	@extends('layouts.adminFoot')

@section('moreJS')

@stop
