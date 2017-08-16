<!DOCTYPE html>
<html>
<head>
    <title>Chats table</title>
     
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/chats.css')}}" rel="stylesheet">

</head>
<body>

    <div class="col-lg-4 col-lg-offset-4">
        <h1 id="greeting">Hello, <span id="username">{{$username}}</span></h1>

        <div id="chat-window" class="col-lg-12">

        </div>
        <div class="col-lg-12">
            <div id="typingStatus" class="col-lg-12" style="padding: 15px"></div>
            <form action="" method="post">
            <input type="text" id="text" class="form-control col-lg-12" autofocus="" onblur="notTyping()">
            </form>
             <input type="hidden" name="csrf-token" content="{{ Session::token() }}">
        </div>
    </div>
<script src="{{asset('lib/jquery-1.12.4.js')}}"></script>
    <!-- <script src="{{asset('js/chats.js')}}"></script> -->
    <script type="text/javascript">
        $(function(){
var username;

username = $('#username').html();

pullData();

$(document).keyup(function(e) {
    if (e.keyCode == 13)
        sendMessage();
    else
        isTyping();
});


function pullData()
{
    retrieveChatMessages();
    retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    $.post('http://localhost:8000/profile/chats/retrieveChatMessages', {username: username}, function(data)
    {
        if (data.length > 0)
            $('#chat-window').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('http://localhost:8000/profile/chats/retrieveTypingStatus', {username: username}, function(username)
    {
        if (username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('');
    });
}

function sendMessage()
{
    var text = $('#text').val();

    if (text.length > 0)
    {
        $.post('http://localhost:8000/profile/chats/sendMessage', {text: text, username: username}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right">'+text+'</div><br>');
            $('#text').val('');
            notTyping();
        });
    }
}

function isTyping()
{
    $.post('http://localhost:8000/profile/chats/isTyping', {username: username});
}

function notTyping()
{
    $.post('http://localhost:8000/chats/notTyping', {username: username});
}
});
    </script>
  
</body>
</html>