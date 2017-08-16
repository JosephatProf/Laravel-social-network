<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">

@extends('templates.default')

@section('content')
<div class="row">
	<div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">My Profile</a></p>
        
            <div >
                <img class="img-circle" src="{{ asset('images/profile'.'/'.Auth::user()->profile_image)}}" height="100px" width="100px">
            </div>
       
      </div>
      <div class="well">
        <p><a href="#">Interests</a></p>
        <p>
          <span class="label label-default">News</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Ey!</strong></p>
        People are looking at your profile. Find out who.
      </div>
      
    </div>
    <div class="col-sm-7">
    	<!-- <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">Status: Feeling Blue</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>     
            </div>
          </div>
        </div>
      </div> -->
    	<div class="row">
        
        
        <div class="col-sm-12">
          <div class="well">
          <h4> {{ $user->getNameOrUsername() }}'s Posts</h4>
            @if (!$statuses->count())
			<p>{{ $user->getNameOrUsername() }} hasn't posted anything yet</p>
		@else
			@foreach ($statuses as $status)

				<div class="media">
					<a class="pull-left" href="{{ route('profile.index',['username'=>$status->user->username])}}">
					<img 
					alt="{{ $status->user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$status->user->getProfileImage()) }}" 
					class="media-object" style="width: 40px; height: 40px;">
					</a>
					<div class="media-object">
						<h4 class="media-heading"><a href="{{ route('profile.index',['username'=>$status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a></h4>
						@if ($status->identity == 1)
							<p>{{$status->body}}</p>
						@endif
						@if($status->identity == 2)
						
							<img class="img-thumbnail" src="{{ asset('images/status_images'.'/'.$status->body) }}" height="250px" width="477px">
							
							
						@endif
						@if($status->identity == 3)
								<video height="300px" width="477px" controls >
							<source src="{{ asset('images/status_images'.'/'.$status->body) }}" type="video/mp4" autoplay="true" >
						</video>
						@endif
						<ul class="list-inline">

						<!-- diffForHuman method calls the exact time or post -->
							<li style="margin-left: 25px;">{{ $status->user->getNameOrUsername() }} Posted {{$status->created_at->diffForHumans()}}</li>
							@if ($status->user->id !== Auth::user()->id)
								<li><a href="{{ route('status.like',['$statusId'=>$status->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
								
								@endif
								<li>{{ $status->likes->count() }} {{ str_plural('like',$status->likes->count()) }}</li>
						</ul>
						@foreach ($status->replies as $reply)
						<div style="margin-left:10%;">
							<div class="media">
								<a href="{{ route('profile.index',['username'=>$reply->user->username])}}" class="pull-left"><img alt="{{ $reply->user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$reply->user->getProfileImage()) }}" 
								class="media-object" style="width: 40px; height: 40px;"></a>
								<div class="media-body">
									<h5 class="media-heading"><a href="{{ route('profile.index',['username'=>$reply->user->username])}}">{{ $reply->user->getNameOrUsername() }}</a></h5>
									<p>{{ $reply->body }}</p>
									<ul class="list-inline" style="margin-left: 25px;">
										<li>Replied {{$status->created_at->diffForHumans()}}</li>
										@if ($reply->user->id !== Auth::user()->id)
											<li><a href="{{ route('status.like',['$reply'=>$status->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
											
										@endif
										<li>{{ $reply->likes->count() }} {{ str_plural('like',$reply->likes->count()) }}</li>
									</ul>
								</div>
							</div>
							</div>
						@endforeach

						<!-- if user is a friend i can be able to comment his status otherwise no comments on not friend -->
						@if ($authUserIsFriend || Auth::user()->id === $status->user->id)
							<div style="margin-left:50px;">
							<form role="form" action="{{ route('status.reply',['statusId'=>$status->id])}}" method="post">
							<div class="form-group{{ $errors->has("reply-{$status->id }") ? ' has-error' : ''}} ">
								<textarea name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to this status">
									
								</textarea><input id="reply-btn" type="submit" name="" value="Reply" class="btn btn-default btn-sm">
								@if ($errors->has("reply-{$status->id }"))
									<span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
								@endif
								</div>
								
									<input type="hidden" name="_token" value="{{ Session::token() }}">
							</form>
							</div>
						@endif
					</div>
				</div>

			@endforeach
			
		@endif
	</div>
	
</div>

        </div>
      </div>
		<!--include('user.partials.userblock') -->
	
		
<div class="col-sm-2 well">
      <!-- <div class="thumbnail">
        <p>Upcoming Events:</p>
        
        
      </div>  -->     
      <div >
        <div class="col-sm-10">
		@if (Auth::user()->hasFriendRequestsPending($user))
			<p>Waiting for {{ $user->getNameOrUsername() }} to accept your request</p>

		@elseif (Auth::user()->hasFriendRequestsRecieved($user))
			<a href="{{ route('friend.accept',['username' => $user->username]) }}" class="btn btn-primary">Accept Friend request</a>
		@elseif (Auth::user()->isFriendsWith($user))
			<p>You and {{ $user->getNameOrUsername()}} are friends</p>
			<form action="{{ route('friend.delete',['username'=> $user->username]) }}" method="post">
				<input type="submit" value="Delete friend" class="btn btn-primary">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		@elseif(Auth::user()->id !== $user->id)
		<a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary">+ Add friend</a>
		@endif
		<h4> {{ $user->getNameOrUsername() }}'s friends</h4>
		@if(!$user->friends()->count())
			<p>{{ $user->getNameOrUsername() }} has no friends</p>
		@else
			@foreach($user->friends() as $user)
				@include('user/partials/userblock')
			@endforeach
		@endif
	</div>
      </div>
      
    </div>
@endsection