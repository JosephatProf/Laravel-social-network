<link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
@extends('templates.default')

@section('content')

    <div class="well">
        @if(Storage::disk('local')->exists(Auth::user()->username.'-'.Auth::user()->id.'.jpg'))
            <div >
                <img src="{{ route('profile.upload.image',['filename'=>Auth::user()->username.'-'.Auth::user()->id.'.jpg'])}}">
            </div>
        @endif
    </div>
    <div class="well">
    
    <form action="{{ route('profile.upload')}}" enctype="multipart/form-data" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="file" name="image">
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    
</div>

</div>
        
   

@endsection

