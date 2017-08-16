<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/creative.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/creative.css') }}"> -->

<style type="text/css">
	
#background{
    position: fixed;
    top: 50%
    left:50%;
    min-width: 100%
    min-height:100%;
    width: 100%;
    height: 100%;
    /*background-size: cover;*/
    z-index: -100;
   
}
#video { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 60%;
    min-height: 60%;
    width: auto;
    height: auto;
    z-index: -100;
    transform: translateX(-50%) translateY(-50%);
 
  background-size: cover;
  transition: 1s opacity;
}
.stopfade { 
   opacity: .5;
}

#polina { 
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:100; 
  background: rgba(0,0,0,0.3);
  color: white;
  padding: 2rem;
  width: 33%;
  margin:2rem;
  float: right;
  font-size: 1.2rem;
}
h1 {
  font-size: 3rem;
  text-transform: uppercase;
  margin-top: 0;
  letter-spacing: .3rem;
}
#polina button { 
  display: block;
  width: 100%;
  padding: .4rem;
  border: none; 
  margin: 1rem auto; 
  font-size: 1.3rem;
  background: rgba(255,255,255,0.23);
  color: #fff;
  border-radius: 3px; 
  cursor: pointer;
  transition: .3s background;
}
#polina button:hover { 
   background: rgba(0,0,0,0.5);
}

a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  background:rgba(0,0,0,0.5);
  padding: .5rem;
  transition: .6s background; 
}
a:hover{
  background:rgba(0,0,0,0.9);
}
@media screen and (max-width: 500px) { 
  div{width:70%;} 
}
@media screen and (max-device-width: 800px) {
  
#cont{
    height: 100%;
}
</style>
@extends('templates.default')

@section('content')

<div id="cont">
<header>
    <div class="header-content">
            <!-- <video autoplay muted="muted" style="width: 100%; height: auto; margin-left: 0px;" loop="true" controls>
                <source src="images/connections.webm" type="video/webm" >
            </video> -->
            <div >
            <img id="video" src="images/banner_image.gif" style="">
            </div>
           <div id="polina">
<h1 style="font-family: verdana; font-size: 18px; color: blue;">Stay Connected</h1>
<p>User Help</p>
<p style="color: blue; ">Register by clicking at the sign up button<br>Ensure all required fields are entered<br>Login with your email and password<br>At the home page, chukasoc is easier to navigate through, meet new friends and have fun!!</p>

<a href="{{ route('auth.signup') }}"><button class="btn btn-success">Sign Up Today</button></a>
</div>
        </div>
        </header>
    </div>

@endsection