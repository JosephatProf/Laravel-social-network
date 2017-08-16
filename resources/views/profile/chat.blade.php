
   @extends('templates.default')

@section('content') 
  <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('css/chatty.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">


<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/chats.css') }}">
    <script type="text/javascript" src=""></script>

    	<div class="ui">
		<div class="left-menu">
				<form action="#" class="search">
					<input placeholder="search..." type="search" name="" id="">
					<input type="submit" value="&#xf002;">
				</form>
				<menu class="list-friends">
				@if(!$friends->count())
	                <p>You have no friends</p>
	            @endif
	                @foreach($friends as $user)
					<li>
						<a class="pull-left" href="{{ route('message.reply', ['friendId'=>$user->id]) }}">
                        <img class="img-circle" alt="{{ $user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$user->profile_image) }}" height="50px" width="50px">
                    </a>
						<div class="info">
							<div class="user"><a href="{{ route('message.reply', ['friendId'=>$user->id]) }}">{{ $user->getNameOrUsername() }}</a></div>
							<div class="status on"> online</div>
						</div>
					</li>
				@endforeach
					
				</menu>
		</div>
		<div class="chat">
			<div class="top">
				<div class="avatar">
					<img class="img-circle" src="{{ asset('images/profile'.'/'.Auth::user()->profile_image)}}" height="50px" width="50px">
				</div>
				<div class="info">
					<div class="name">{{ Auth::user()->getNameOrUsername() }}</div>
					<div class="count">already 1 902 messages</div>
				</div>
				<i class="fa fa-star"></i>
			</div>
			<span id="username" hidden="hidden">{{ Auth::user()->getNameOrUsername() }}</span>
			<ul class="messages">
			
			@foreach ($data as $text)
				<li class="i">
					<div class="head">
						<span class="time">10:13 AM, Today</span>
						<span class="name">{{ Auth::user()->getNameOrUsername() }}</span>
					</div>
					<div class="message">{{ $text->message }}</div>
				</li>
			@endforeach
				
			</ul>

			<div class="write-form">
			<div id="typingStatus" class="col-lg-12" style="padding: 12px;">{{ Auth::user()->getNameOrUsername() }} is typing</div>
			<form role="form" method="post" action="{{ route('messages.post',['friendId'=>1]) }}">
				<textarea placeholder="Type your message" name="e" id="texxt"  rows="2" onblur="notTyping()"></textarea>
				<i class="fa fa-picture-o"></i>
				<i class="fa fa-file-o"></i>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
				<span class="send">Send</span>
				</form>
			</div>
		</div>
	</div>

    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/nicescroll/3.5.4/jquery.nicescroll.js'></script> -->
<script type="text/javascript">
$(document).ready(function(){
    $("#test").hide();
    $("#typingStatus").hide();
     $(document).keyup(function(e) {
        var text = $('#text').val();
        isTyping();
        if (e.keyCode == 13){
            $("#test").show();
            
            $('#text').val('');
             setTimeout(
            function(){                        
                $('#chat_window').append('<br><div style="text-align: right">'+text+'</div><br>');

            }, 1500);
        }
    });
    function isTyping()
    {
        $("#typingStatus").show();
    }
    function notTyping()
    {
        $("#typingStatus").hide();
    }
});
</script>

    
@endsection