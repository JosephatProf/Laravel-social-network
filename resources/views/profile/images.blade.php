@extends('templates.default')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Posting images is fun. Enjoy!!</div>
				<div class="panel-body">
					

					<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ Session::token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Select image to post</label>
							<div class="col-md-6">
								<input type="file" name="post-image" class="form-control" >
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									<span class=" glyphicon glyphicon-upload"> Upload</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
