@extends('templates.default')

@section('content')
Hello advertisers
<div>
	@if(!$advert->count())
		<p>No adverts found</p>
	@else

		@foreach($advert as $ad)
			<p>{{ $ad->advert_name }}</p>
		@endforeach
	@endif
</div>

@endsection