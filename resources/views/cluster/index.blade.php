@extends('layouts.app')
@section('pageCss')
@endsection
@section('content')
<div class="container border-2 border-dark border shadow-sm bg-body rounded">
    <div class="row justify-content-center">
        <h1 class="text-center">index page of clusters</h1>
        <ul>
            @foreach($data as $d)
            <li>{{ $d->name}}</li>
            @endforeach

        </ul>
    </div>
</div>

@endsection
@section('pageJs')
@endsection