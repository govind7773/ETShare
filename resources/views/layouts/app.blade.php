<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ETShare') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>@media screen and (max-width: 500px) {
        #left_menu{
                display:none;
            }
    }</style>
</head>
<body >
<nav class="navbar-expand-sm bg-dark navbar navbar-dark sticky-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand fs-4 py-0 px-3" href="#">ETShare <i class="fa-solid fa-bars text-white pl-3" id="bar_button"></i></a>
        </div>
        <div class="dropdown nav navbar-nav navbar-right">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('user_logo.png') }}" alt="" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Welcome {{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark  shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item text-dark" href="#">Edit Profile</a></li>
                        <li> <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                        
                    </ul>
                </div>
    </div>
    
</nav>
<div class="container-fluid">
    
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark sticky-left" id="left_menu">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto text-white text-decoration-none pb-3"><img src="{{asset('logo.png')}}" alt=""  width="60" height="60" class="rounded-circle ml-2">
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                        <i class="fas fa-home"></i><span class="ms-1 d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                        <i class="fas fa-plus"></i><span class="ms-1 d-sm-inline">New Panel</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <i class="fa fa-list"></i> <span class="ms-1 d-sm-inline">Panels</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Product</span> 1</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Product</span> 2</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Product</span> 3</a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Product</span> 4</a>
                            </li>
                        </ul>
                    </li>
                </ul>  
            </div>
        </div>
        <div class="col py-5 px-5">
            @yield('content')
            <footer class="fixed-bottom bg-dark text-white">
                <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 float-right fs-6"><span
                            class="float-md-left d-block d-md-inline-block px-2">Copyright  &copy; 2022 <a
                                class="text-bold-800 grey darken-2 px-2"
                                href="" target="_blank">ETShare</a><span
                            class="float-md-right d-block d-md-inline-blockd-none d-lg-block px-2"> Hand-crafted & Made with <i class="fas fa-heart"></i></span>
                </p>
            </footer>
        </div>
    </div>
</div>
</body>

<script>
    $(document).ready(function(){
     $('#bar_button').click(function(){
        if($('#left_menu').css('display') == 'none'){
            $('#left_menu').fadeIn();
        }else{
            $('#left_menu').fadeOut();
        }
    }) ;
});
   
</script>
</html>
