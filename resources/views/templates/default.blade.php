<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ChukaSoc</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<meta charset="utf-8" type="hidden" name="_token" value="{{ Session::token() }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('./bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('./lib/jquery-ui.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('./bootstrap/css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ URL::asset('./lib/jquery-2.2.4.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('./js/chatty.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('./lib/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('./bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('./js/jquery.nicescroll.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('./js/index.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/creative.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/creative.css') }}"> 

	<style type="text/css">
		html body{
			background-color: rgb(244, 246, 249);

		}
		.jumbotron {
		  padding: 48px 0 36px;
		  margin-top: -40px;
		  background: url('');

		}
		.navbar {
		  min-height: 40px;
		}

		.navbar-default {
		  background: transparent;
		  border: 0;
		  margin-bottom: 0;
		}

		.navbar-nav > li {
		  background: @black;

		  a{
		    padding: 10px;
		  }
		}
		
	</style>
</head>
<body >

@include('templates.partials.navigation')

<!-- <div class="panel panel-primary" style="background-color: rgba(245, 245, 245, 0);"> -->

<div class="container-fluid" >
	@include('templates.partials.alert')



	@yield('content')
</div>
<!-- include('templates.partials.footer') -->

</body>
</html>