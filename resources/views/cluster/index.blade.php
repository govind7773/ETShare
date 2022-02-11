@extends('layouts.app')
@section('pageCss')
<link rel="stylesheet" href="{{asset('css/clusters/index.css')}}">
@endsection
@section('content')
<div class="container border-2 border-dark border shadow-sm bg-body rounded">
    <div class="row justify-content-center d-flex flex-column">
        <h1 class="my-4 fw-bold mx-3">List of Cluster's</h1>
        @foreach($data as $cluster)
        <div class="cluster-body card border border-dark bg-dark shadow mb-3 mx-auto rounded">
            <div class="card-body py-1">
            <a href="/cluster/{{$cluster->id}}" class="text-decoration-none">
            <h3 class="cluster-head">{{$cluster->name}}</h3>
            <p class="d-inline fst-italic">{{$cluster->section}}</p>
            <p class="d-inline float-right fst-italic">Admin- {{$cluster->user_name}}</p>
            </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@section('pageJs')
@endsection