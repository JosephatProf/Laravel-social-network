<style type="text/css">
	#cont{
		height: 85%
	}
</style>
@extends('templates.default')

@section('content')
<div class="container-fluid" id="cont">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Sign Up to CS</div>
				<div class="panel-body">
					<!-- @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif -->

					<form class="form-horizontal" role="form" method="POST" action="{{ route('auth.signup') }}">
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
								@if ($errors->has('first_name'))
									<span class="help-block">{{ $errors->first('first_name')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
								@if ($errors->has('last_name'))
									<span class="help-block">{{ $errors->first('last_name')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('email') ?' has-error' : '' }}">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ Request::old('email') ?: ''  }}">
								@if ($errors->has('email'))
									<span class="help-block">{{ $errors->first('email')}}</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="{{ old('username') }}">
								@if ($errors->has('username'))
									<span class="help-block">{{ $errors->first('username')}}</span>
								@endif
							</div>
						</div>
						
						

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
								@if ($errors->has('password'))
									<span class="help-block">{{ $errors->first('password')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
								@if ($errors->has('password_confirmation'))
									<span class="help-block">{{ $errors->first('password_confirmation')}}</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Sign Up
								</button>
							</div>
							<input type="hidden" name="_token" value="{{ Session::token() }}">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

