<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/chats.css') }}">

@extends('templates.default')

@section('content')
<script type="text/javascript" src="{{ asset('lib/jquery-2.2.4.js') }}"></script>  
<script type="text/javascript" src="{{ asset('js/chats.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery-1.12.4.js') }}"></script> 
<div class="container" onload="show()">
<div class="col-lg-4 col-lg-offset-4" id="wrap">
    <h1 id="greeting">Hello, <span id="username">{{ Auth::user()->getNameOrUsername() }}</span></h1>

<div id="chat-window" class="col-lg-12">
    
</div>
<div class="col-lg-12">
    <div id="typingStatus" class="col-lg-12" style="padding:15px;"></div>
    <input type="text" name="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
</div>
</div>
</div>
@endsection
 