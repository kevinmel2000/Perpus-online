<!DOCTYPE html>
<head>
	<title>@yield('title')</title>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css "/>
	<link rel="stylesheet" href="{{ URL::to('src/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/css/animate.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::to('src/css/colors/blue-dark.css') }}" id="theme">
	<link rel="stylesheet" href="{{ URL::to('src/css_kecil/main.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap">
	@yield('styles')
</head>
<body>

<div class="container">
	@yield('content')
</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"
 integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
 crossorigin="anonymous"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
<script src="https://use.fontawesome.com/aa70489379.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script type="text/javascript" src="{{URL::to('src/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('src/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('src/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('src/js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{URL::to('src/js/waves.js')}}"></script>
<script type="text/javascript" src="{{URL::to('src/js/custom.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to ('src/js/modal.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>