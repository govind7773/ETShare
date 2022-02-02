<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ETShare') }}</title>
    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .loginBtn a{
                text-decoration: none;
                color: white;
                border-bottom : 2px solid #ff4141;
                }
        .signUpBtn a{
                text-decoration: none;
                color: white;
                 }
    </style>
</head>
<body>
    <div class="container">
        <div class="form">
            <div class="btn">
                <button class="loginBtn"><a href="{{ route('login') }}">{{ __('Login') }}</a></button>
                <button class="signUpBtn"><a href="{{ route('register') }}">{{ __('Register') }}</a></button>
            </div>
            <form class="login" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="formGroup">
                    <input type="email" placeholder="Email ID" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>   
                </div>
                <div class="formGroup">
                    <input type="password" id="password" placeholder="Password" name="password" required
                        autocomplete="current-password">    
                </div>
                <div class="checkBox">
                    <input type="checkbox" name="remember" id="checkbox">
                    <span class="text">{{ __('Remember Me') }}</span>
                </div>
                <div class="formGroup">
                    <button type="submit" class="btn2">{{ __('Login') }}</button>
                </div>
                <!-- <div class="formGroup">
                <h3>{{__('or')}}</h3> 
                </div>
                <div class="formGroup">     
                @if (Route::has('password.request'))
                    <a class="btn btn-link" id="forgotpassword" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div> -->
            </form>
        </div>
    </div>
</body>

</html>