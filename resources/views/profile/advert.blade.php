<style type="text/css">

 
.center {
  position: absolute;
/*  top: 0;
  bottom: 0; */
  left: 0;
  right: 0;
  margin: auto;  
}
.container .panel {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}
</style>
@extends('templates.default')

@section('content')

   <div class="container-fluid">
   
	<div class="row">
		<div class="col-md-6 ">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3>Catch your customers instantly!! </h3> Fill in your advert details below</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal well" role="form" method="POST" action="" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ Session::token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Advert </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="adname" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Owner Website url (optional)</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="website">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Payment valid Key</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="validkey">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Images or Video</label>
							<div class="col-md-6">
								<input type="file" name="adImage" class="form-control">
							</div>
						</div>

						<div class="form-group">
					      <label for="sel1" class="col-md-4 control-label">Period of Advertising</label>
						      <div class="col-md-6">
						      <select class="form-control" id="sel1" name="period">
						        <option>1 Month</option>
						        <option>3 Months</option>
						        <option>6 Months</option>
						        <option>1 Year</option>
						      </select>
						      </div>
					     </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading"><h3>Previous Adverts and their performance </h3></div>
				<div class="panel-body">
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
			</div>
		</div>
		
	</div>


</div>


@endsection