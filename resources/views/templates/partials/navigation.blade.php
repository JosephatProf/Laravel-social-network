<style type="text/css">
	.navbar-custom {
    background-color:#45A79B;
    color:#ffffff;
    border-radius:0;
}

.navbar-custom .navbar-nav > li > a {
    color:#fff;
}

.navbar-custom .navbar-nav > .active > a {
    color: #ffffff;
    background-color:transparent;
}

.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus,
.navbar-custom .navbar-nav > .active > a:hover,
.navbar-custom .navbar-nav > .active > a:focus,
.navbar-custom .navbar-nav > .open >a {
    text-decoration: none;
    background-color: #45A79B;
}

.navbar-custom .navbar-brand {
    color:#eeeeee;
}
.navbar-custom .navbar-toggle {
    background-color:#eeeeee;
}
.navbar-custom .icon-bar {
    background-color:#33aa33;
}
</style>

<nav class="nav bar navbar-custom" role="navigation" >

	<div class="container-fluid" >
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('home')}}" color="blue"> <span style="font-family: verdana; font-size: 26px;">ChukaSoc</span></a>
		</div>
		<div class="collapse navbar-collapse">
				@if (Auth::check())
			<ul class="nav navbar-nav">

				<li><a href="{{ route('home') }}" class="active"><span class="glyphicon glyphicon-globe"></span> Timeline</a></li>
				
				
			</ul>
			<form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
				<div class="input-group" style="width: 450px">

				<input type="text" name="query" class="form-control" placeholder="search people e.g professor... " >
					<span class="input-group-btn">
				        <button class="btn btn-secondary" type="submit">Go!</button>
				      </span>
				</div>
				
			</form>

			@endif
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
				<!-- <li>
					<img src="/images/true.png" alt="profile-pic" class="img-circle" width="30px">
				</li> -->
				<li>
				<a href="{{ route('profile.index',['username'=>Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
				
				<!-- <li><a href="{{ route('profile.upload') }}"> Pictures</a></li> -->
				<li><a href="{{ route('profile.advert') }}"><span class="glyphicon glyphicon-gift"></span> Advertise </a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="glyphicon glyphicon-bell"></span> Notifications <b class="caret"></b></a>
				
					 <ul class="dropdown-menu message-dropdown">

                      
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Cirilo Josephat</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Posted a picture click here to comment</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>You</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>20 friends likes your status</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
				</li>
				<li><a href="{{ route('profile.chats') }}"><span class="glyphicon glyphicon-envelope"></span> Inbox<span class="badge">12</span> </a></li>
				<li class="dropdown">
		        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Settings
		        <span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="{{ route('profile.edit') }}">Update Profile</a></li>
		          <li><a href="{{ route('home') }}">Friends</a></li>
		          <li><a href="{{ route('auth.signout') }}" >Sign Out</a></li>
		          
		        </ul>
		      </li>
				
				
				@else
				<li><a href="{{ route('auth.signin') }}"><span class="glyphicon glyphicon-log-in"></span>
				Sign in</a></li>
				<li><a href="{{ route('auth.signup') }}"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>

				@endif
			</ul>
		</div>
	
	</div>
</nav>