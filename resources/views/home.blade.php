@extends('layouts.app')
@section('pageCss')
<style>
    #content{
        width:40%;
    }
    #btn01:hover{
        background-color: #262626;
    color: #d7d4d4;
    }
    @media screen and (max-width: 750px) {
        #content{
                width:90%;
            }
        }
        
</style>
@endsection
@section('content')
<div id="loading"></div>
<div class="container">
    <div class="row justify-content-center text-white p-2 " style="background-color:black;">
    <div class="">
    <video preload="auto"  autoplay muted loop id="content" class="m-auto d-block">
        <source src="{{ asset('welcome.mp4')}}" type="video/mp4">
        <source src="{{ asset('welcome.webm')}}" type="video/webm">
    </video>
    <h1 class="text-center text-primary fw-bold" style="font-family: cursive;">ETShare</h1>
    <h4 class="text-center my-0 text-white-50">Create or Join a new cluster and start sharing files and assignments with team.</h4>
    <h4 class="text-center my-0 text-white-50">Easy to send, download and share content with friends, group members and student's.</h4>
    <h4 class="text-center my-0 text-white-50">Let's start</h4>
    <div class="row justify-content-center"><a href="{{route('cluster.create')}}" class="text-decoration-none text-white col-auto "><h4 id="btn01" class="text-center border p-2 col-auto m-2 rounded">Create Now</h4></a></div> 
    </div>
    </div>
</div>
@endsection
@section('pageJs')
<script>
   (function (window, document, $) {
    'use strict';
    hideloading();
})(window, document, jQuery);
</script>
@endsection