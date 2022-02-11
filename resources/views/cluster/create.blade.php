@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card border border-2 border-dark">
                    <div class="card-header font-large-1"><h1 class="text-center">Create Cluster</h1></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('cluster.store')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="cname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Cluster Name') }}</label>
                                <div class="col-md-6">
                                    <input id="cname" type="text"
                                           class=" form-control " name="cname" required>
                                    <small id="nameHelp" class="form-text text-muted"> Enter an appropriate name for the cluster
                                    </small>
                                    @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="section"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Enter Section') }}</label>
                                <div class="col-md-6">
                                    <input id="section" type="text"
                                           class=" form-control " name="section" >
                                    <small id="sectionHelp" class="form-text text-muted"> Enter class section or year
                                    </small>
                                </div>
                            </div>
                            <input readonly id="creator" type="text" value="{{auth()->id()}}" class="hidden"
                                   name="creator" hidden>
                            <div class="form-group row m-auto justify-content-center ">
                                    <button type="submit" class="btn btn-primary col-3">
                                        {{ __('Create Now') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection