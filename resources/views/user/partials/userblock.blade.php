
<div class="media">
	<a class="pull-left" href="{{ route('profile.index', ['username'=>$user->username]) }}">
		
		<img class="img-circle" alt="{{ $user->getNameOrUsername() }}" src="{{ asset('images/profile'.'/'.$user->profile_image) }}" height="40px" width="40px">
	</a>
	<div class="media-body">
		<h4 class="media-heading"><a href="{{ route('profile.index', ['username'=>$user->username]) }}">{{ $user->getNameOrUsername() }}</a></h4>

		@if($user->location)
			<p>{{ $user->location}}</p>
		@endif
	</div>	
</div>
<!-- <img class="media-object" alt="" src="{{ $user->getAvatarUrl() }}"> -->