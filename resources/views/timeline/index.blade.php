
@extends('templates.default')

@section('content')
<script type="text/javascript">
	$(document).ready(function(e){
		$("#form_reply").hide();
		$("#respond_comm").click(function(){
			$("#form_reply").toggle();
		});
	});
</script>
<div class="row">
	<div class="col-sm-3 well">
      <div class="well">
        <p><a href="{{ route('profile.edit')}}">My Profile</a></p>
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
      <h4><a href="{{ route('profile.group') }}">Create Group</a></h4>
        
        <p><strong>Groups You Can Join!!</strong></p>
        @foreach ($groups as $group)
		    <img class="img-circle" src="{{ asset('images/groups'.'/'.$group->group_image) }}" alt="{{ $group->group_name }}" height="45px" width="45px">
		    <div class="media-body">
				<h4 class="media-heading"><a href="#">{{ $group->group_name }}</a>
					
				</h4>
				
				
				<p><a href="#">Members : {{ $group->joined }}</a></p>
				
			</div>
			<span>
				@if($group->user_id == Auth::user()->id )
					<span>You already joined this group</span>
				@else
					<a href="{{route('group.join',['groupname'=>$group->group_name])}}"> <button class="btn btn-primary">Join</button></a>
				@endif
			</span>
			<br>
		@endforeach
       
      </div>
      
    </div>
	<div class="col-sm-6">
		<div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p >Say something. Surprise your friends</p>
              <div class="col-sm-7">
				<form role="form" action="{{ route('status.post') }}" method="post">
					<div class="form-group{{ $errors->has('status') ? ' has-error': '' }}">
						<input class="form-control" contenteditable="true" type="text" placeholder="what's up {{ Auth::user()->getNameOrUsername() }}" name="status" class="form-control" rows="2" style="width: 550px;height: 50px;">
							
						</input><button type="submit" class="btn btn-primary">Update status</button>
						
						@if ($errors->has('status'))
							<span class="help-block">{{ $errors->first('status')}}</span>
						@endif
					</div>
					
			<input type="hidden" name="_token" value="{{ Session::token() }}">
				</form>
				<a href="{{ route('profile.images') }}"><button class="btn btn-success">Post picture</button></a>
			</div>    
            </div>
          </div>
        </div>
        
        <div class="col-sm-12">
          <div class="well">
            <!-- timeline status and replies -->
		@if (!$statuses->count())
			<p>There is no post in your timeline</p>
		@else
			@foreach ($statuses as $status)
			
				<div class="media">
					
					<a class="pull-left" href="{{ route('profile.index',['username'=>$status->user->username])}}">
					<div class="well">
					<img 
					alt="{{ $status->user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$status->user->getProfileImage()) }}" 
					class="media-object" style="width: 40px; height: 40px;">
					
					</div>
					</a>
					
					<div class="media-object">
						<h4 class="media-heading"><a href="{{ route('profile.index',['username'=>$status->user->username])}}">{{ $status->user->getNameOrUsername() }}</a></h4>
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
						<ul class="list-inline" style="margin-left: 10%;">

						<!-- diffForHuman method calls the exact time or post -->
							<li>Posted {{$status->created_at->diffForHumans()}}</li>
							@if ($status->user->id !== Auth::user()->id)
								<li><a href="{{ route('status.like',['$statusId'=>$status->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
								
							@endif
							<li>{{ $status->likes->count() }} {{ str_plural('like',$status->likes->count()) }}</li>
						</ul>
						@foreach ($status->replies as $reply)
						<hr>
						<div style="margin-left:50px;">
							<div class="media">
								<a href="{{ route('profile.index',['username'=>$reply->user->username])}}" class="pull-left">
									<img 
					alt="{{ $reply->user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$reply->user->getProfileImage()) }}" 
					class="media-object" style="width: 40px; height: 40px;">
								</a>
								<div class="media-body">
									<h5 class="media-heading"><a href="{{ route('profile.index',['username'=>$reply->user->username])}}">{{ $reply->user->getNameOrUsername() }}</a></h5>
									<p >{{ $reply->body }}</p>

									<ul class="list-inline" style="margin-left: 25px;">

									<!-- user can not like his own status or like -->
										<li>Replied to this post {{$status->created_at->diffForHumans()}}</li>
										@if ($reply->user->id !== Auth::user()->id)
										<li><a href="{{ route('status.like',['$statusId'=>$reply->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
										@endif
										<li>{{ $reply->likes->count() }} {{ str_plural('like',$reply->likes->count()) }}</li>
									</ul>
								</div>
							</div>
							</div>

						@endforeach
						<!-- <button class="btn btn-primary" id="respond_comm">Reply</button> -->

						<div style="margin-left: 45px;">
										
							<form id="form_reply"  role="form" action="{{ route('status.reply',['statusId'=>$status->id])}}" method="post" >
							<input type="hidden" name="_token" value="{{ Session::token() }}">
							
							<div class="form-group{{ $errors->has("reply-{$status->id }") ? ' has-error' : ''}} " >

								<input style="margin-left: 10%; width: 85%;" type="text" name="reply-{{ $status->id }}" class="form-control" rows="2" placeholder="Reply to this status" >
									
								<!-- <input id="reply-btn" type="submit" name="" value="Reply" class="btn btn-default btn-sm"> -->
								@if ($errors->has("reply-{$status->id }"))
									<span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
								@endif
								</div>
								
									
							</form>
							</div>
			

					</div>
				</div>

			@endforeach
			{!! $statuses->render() !!}
		@endif
          </div>
        </div>
      </div>
		
	</div>
	<div class="col-sm-3 well">
		
      <div class="well">
        <strong>My Friends</strong>
        @if(!$friends->count())
				<p>You have no friends</p>
		@else
			@foreach($friends as $user)
				@include('user/partials/userblock')
			@endforeach
		@endif
        
      </div> 
      <div class="well">
      <strong>Friend Requests</strong>
      	<!-- list of friend requests -->
				@if(!$requests->count())
					<p>You have no friend requests</p>
				@else
					@foreach($requests as $user)
						@include('user/partials/userblock')
					@endforeach
				@endif
      </div>     
      <div class="well">
      	<strong>Adverts</strong>
      	@if(!$advert->count())
				<p>No adverts found</p>
		@else
			@foreach($advert as $ad)
			<div class="media">
				<a class="pull-left"  href="{{ route('profile.advert', ['advert'=>$ad->advert_name]) }}">
					
					<img class="img-thumbnail" alt="{{ $ad->advert_name }}" src="{{ asset('images/adverts'.'/'.$ad->advert_media) }}" height="40px" width="40px">
				</a>
				<div class="media-body">
					<h4 class="media-heading"><a href="{{ route('profile.advert', ['advert'=>$ad->advert_name]) }}">{{ $ad->advert_name }}</a></h4>
					<p><a href="{{ $ad->advert_website }}">{{ $ad->advert_website }}</a></p>
				</div>	
			</div>
			@endforeach
		@endif


      </div>
      <div class="well">
      	<strong>Suggested friends</strong>
      	@if(!$suggested->count())
		<!-- no message to display here -->
		@else
			@foreach($suggested as $suggest)
				@include('user/partials/userblock')
				@if(Auth::user()->id !== $user->id)
				<a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary">+ Add friend</a>
				@endif
			@endforeach
		@endif
			
      	
      </div>
      <div class="well">
			<p>Today's Calendar </p>
			<span id="datepicker"></span>
			<script type="text/javascript">
				$.datepicker.setDefaults({
				  showOn: "both",
				  buttonImageOnly: true,
				  buttonImage: "calendar.gif",
				  buttonText: "Calendar"
				});
				$( "#datepicker" ).datepicker({
				  // beforeShowDay: $.datepicker.noWeekends
				});
			</script>
		</div>
    </div>
</div>
@endsection
