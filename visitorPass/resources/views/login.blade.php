@extends('layouts.indexLayout')
@section('title', 'Login page')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('loginUser')}}">
                @csrf
                <span class="login100-form-title p-b-26">
                    Welcome - Login
                    <img src="assets/images/VP.jpg" />
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>
                @error('email')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>
                @error('password')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror


                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>
                @if ( session("status"))
                    <p class="uk-text-danger">{{session("status")}}</p>
                @endif

                <div class="text-center p-t-115">
                    <span class="txt1">
                        Don’t have an account?
                    </span>

                    <a class="txt2" href="/register" style="color: #0079ca">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

@endsection
