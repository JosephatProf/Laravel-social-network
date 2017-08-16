<!DOCTYPE html>
<html>
<head>
	<title>laravel chat demo</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
	<script type="text/javascript" src="{{ asset('lib/jquery-2.2.4.js') }}"></script>  
<!-- <script type="text/javascript" src="{{ asset('js/chats.js') }}"></script> -->
<script type="text/javascript">
	$(document).on('keydown','.send',function(e){
		var msg = $(this).val();
		var element = $(this);
		if (!msg == '' && e.keyCode == 13 && !e.shiftKey) 
		{
			
			$.ajax({
				url:'{{url("chatsyst/add")}}',
				type:'post',
				data:{_token:'{{ csrf_token() }}',msg:msg},

			});
			element.val('');//clears previus text input
			setTimeout(liveChat,1000);
		}
	});

	function liveChat()
	{
		$.ajax({
			url:'{{url("ajax")}}',
			data:{_token:'{{ csrf_token() }}'},
			success:function(data)
			{
				$('.chat-box').append('<div class="alert alert-info">'+data['msg']+'</div>');
				
			},
			error:function()
			{
				setTimeout(liveChat,3000);
			}
		});
	}

	
</script>
</head>
<body>
<div class="container">

<h1>Josephat in control</h1>
<div class="row">
	<div class="col-md-6">
		<div class="chat-box">
		@foreach($tests as $test)
			<div class="alert alert-info">{{$test->msg}}</div>
		@endforeach
			
		</div>
		<input class="form-control send" type="text"></input>
	</div>
</div>
</div>
</body>
</html>