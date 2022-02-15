@extends('layouts.app')
@section('pageCss')
@endsection
@section('content')
<div class="container ">
    <div class="row justify-content-center d-flex flex-column">
        <div class="cluster-heading bg-dark text-white py-2">
            <div class="my-4 fw-bold mx-3 h1 d-inline">{{$data[0]->name}}</div>
            <a href="#" class="btn btn-raised btn-primary float-right ml-1">View Members</a>
            <a href="#" class="btn btn-raised btn-success float-right ml-1">Share</a>
            <div class="des p-2 text-white-50">
            <h4 class="d-inline fst-italic ml-3">{{$data[0]->section}}</h4>
            <h4 class="d-inline float-right fst-italic mr-3">{{$data[0]->user_name}}</h4>    
            </div>
        </div>
        <div class="bg-white border-2 py-3 my-3 border-dark border shadow-lg">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            <form id="message_form" action="/cluster/ajaxMessageSend" method="POST">
            @csrf         
            <input type="text" class="form-control" name="message" id="message" placeholder="Enter text here.." required>
            <div class="row mx-1">
                <input class="form-control col-4" type="file"  name="input_file" id="input_file" multiple>
                <input readonly id="sender" type="text" value="{{auth()->id()}}" class="hidden" name="sender" hidden>
                <input readonly id="cluster_id" type="text" value="{{$data[0]->id}}" class="hidden" name="cluster_id" hidden>
                <button type="submit" class="btn btn-success float-right col-auto">{{'Send'}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('pageJs')
@endsection