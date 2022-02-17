@extends('layouts.app')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/clusters/view.css')}}">
@endsection
@section('content')
<div id="loading"></div>
<div class="container ">
    <div class="row justify-content-center d-flex flex-column">
        <div class="cluster_heading text-white py-2 rounded">
            <div class="my-4 fw-bold mx-3 h1 d-inline text-primary">{{$data[0][0]->name}}</div>
            <a href="#" class="btn btn02 btn-raised float-right ml-1 text-white border border-danger">View Members</a>
            <a href="#" class="btn btn01 btn-raised float-right ml-1 text-white border border-success">Share</a>
            <div class="des p-2 text-white">
            <h4 class="d-inline fst-italic ml-3">{{$data[0][0]->section}}</h4>
            <h4 class="d-inline float-right fst-italic mr-3">{{$data[0][0]->user_name}}</h4>    
            </div>
        </div>
        <div class="py-3 my-3  shadow-lg rounded" id="input_box">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            <form id="message_form" action="/cluster/ajaxMessageSend" method="POST" enctype="multipart/form-data">
            @csrf         
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter text here.." required>
            <div class="row mx-1">
                <input class="form-control col-4" type="file"  name="input_file" id="input_file" multiple required>
                <input readonly id="sender" type="text" value="{{auth()->id()}}" class="hidden" name="sender" hidden>
                <input readonly id="cluster_id" type="text" value="{{$data[0][0]->id}}" class="hidden" name="cluster_id" hidden>
                <button type="submit" id="send_message" class="btn btn01 text-white border border-success float-right col-auto">{{'Send'}}</button>
            </div>
            </form>
        </div>
        <div id="content_box">
        @foreach($data[1] as $d)
        <div class="cluster_heading text-white py-4 my-2 rounded">
            <div class="my-0 ">
            <p class="d-inline border p-1" >{{$d->sender_name}}</p>
            <p class="d-inline float-right my-0" style="color: #cbd1d1;">{{$d->create_time}}</p>
            </div>
            <div class="my-2">
            <p class="d-inline fst-italic" style="color: #cbd1d1;">{{$d->message}}</p>
            <p class="d-inline float-right fst-italic">
                <a href="/cluster/downloadFileContent/{{$d->content}}" id="downloadFile" class="text-decoration-none">Attachment  
                    <span class="h3 mx-2"><i class="fas fa-file-download"></i> </span></a>
                <a href="/cluster/removeFile/{{$d->id}}" class="text-decoration-none delete_content">
                    <span class="h3 mx-2"> <i class="fa-solid fa-trash-can"></i></span></a>
            </p>    
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
@section('pageJs')
<script src="{{asset('js/clusters/view.js')}}"></script>
@endsection