<link rel="stylesheet" type="text/css" href="{{ URL::asset('../bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('../bootstrap/css/bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('../js/realchat.js') }}"></script>

<style type="text/css">
    #cont{
        height: 92%;
    }
    #chatpanel{
        height: 530px;
    }
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;

}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 420px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}


}
</style>
@extends('templates.default')

@section('content')
<div class="container" id="cont">
    <div class="row" style="margin-left: 180px;">
    <div class="col-sm-3">

      <div class="well">
      <h2>Online friends</h2>
      <p><span style="color: blue;">Choose any to chat with, Enjoy.</span></p>
            @if(!$friends->count())
                <p>You have no friends</p>
            @endif
                @foreach($friends as $user)
                    
                <div class="media">
                    <a class="pull-left" href="{{ route('message.reply', ['friendId'=>$user->id]) }}">
                        <img class="img-circle" alt="{{ $user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$user->profile_image) }}" height="40px" width="40px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('message.reply', ['friendId'=>$user->id]) }}">{{ $user->getNameOrUsername() }}</a></h4>

                        @if($user->location)
                            <p>{{ $user->location}}</p>
                        @endif
                    </div>  
                </div>
            @endforeach
                
            
      </div>
    </div>
        <div class="col-sm-7">
            <div class="panel panel-success" id="chatpanel">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Chat  &nbsp {{ Auth::user()->getNameOrUsername() }}
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li><a href="#"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-time"></span>
                                Away</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-off"></span>
                                Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body" id="chatbody">
                    <p style="font-size: 18; font-weight: bold;">Hello {{ Auth::user()->getNameOrUsername() }} Please select one of your friends to chat with!! Have fun!!!</p>
                </div>
                
            <div class="panel-footer">
            
                    <div class="form-group">

                    <div id="typingStatus" class="col-lg-12" style="padding: 12px;">{{ Auth::user()->getNameOrUsername() }} is typing</div>
                    <form role="form" method="post" action="{{ route('messages.post',['friendId'=>$user->id]) }}">
                        <input id="text" type="text" name="message" class="form-control" placeholder="Type your message here..." autofocus="" onblur="notTyping()">
                        <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                        @if ($errors->has('message'))
                            <span class="help-block">{{ $errors->first('message')}}</span>
                        @endif
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                    </div>
                   
                </div>
            </div>
        </div>

    </div>
</div>
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