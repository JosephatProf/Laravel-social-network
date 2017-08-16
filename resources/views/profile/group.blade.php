<link rel="stylesheet" type="text/css" href="{{ URL::asset('../bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('../bootstrap/css/bootstrap.css') }}">
<style type='text/css'>

.hero-unit {
  padding: 50px 50px 50px 50px;
}

.form-horizontal .control-label {
  width: 61px;
}

.form-horizontal .controls {
  margin-left: 80px;
}
/* Landscape phone to portrait tablet */
@media ( max-width : 767px) {
}
/* Landscape phones and down */
@media ( max-width : 480px) {
  .hero-unit {
    margin-left: -20px;
    margin-right: -20px;
  }
  .form-horizontal .controls {
    margin-left: 0;
  }
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
#cont{
    height: 90%;

}
#span{
    margin-left: 25%
}
</style>
@extends('templates.default')

@section('content')
    <div class="container well" id="cont">
    <div class="hero-unit">
      <div class="row-fluid">
        <div class="offset4 " id="span">
          <legend ><h2>Create group</h2></legend>
          <form  enctype="multipart/form-data" method="post" action="">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <div class="form-group{{ $errors->has('g_name') ? ' has-error' : '' }}">
              <label class="control-label" for="group-name">Group Name</label>
              <div class="controls" style="width: 350px;">
                <input class="form-control" type="text" id="g_name" name="g_name" placeholder="group name">
                @if ($errors->has('g_name'))
                    <span class="help-block">{{ $errors->first('g_name')}}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('g_name') ? ' has-error' : '' }}">
              <label class="control-label" for="numberofmembers">Maximum no of members for this group:</label>
              <div class="controls" style="width: 350px;">
                <input class="form-control" type="text" name="members" id="inputMembers" placeholder="600">
                @if ($errors->has('members'))
                    <span class="help-block">{{ $errors->first('members')}}</span>
                @endif
              </div>
            </div>
             <div class="form-group">
              <label class="control-label" for="groupImage" ">Group Photo</label>
              <div class="controls" style="width: 350px;">
               <!-- <span class="glyphicon glyphicon-book"></span> -->
                <input class="form-control" type="file" name="g_image">
              
              </div>
            </div>
           
            <div class="form-group">
              <div class="controls" >
                
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection

