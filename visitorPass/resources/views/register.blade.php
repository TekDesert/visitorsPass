@extends('layouts.indexLayout')
@section('title', 'Register page')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="POST" action="{{ route('registerUser') }}" enctype="multipart/form-data">
                @csrf
                <img src="assets/images/VP.jpg" style="margin-left:40px" />
                <span class="login100-form-title p-b-26">
                    Welcome - Register

                    <label for="picture">

                        <img id="picPreview" src="https://i.stack.imgur.com/l60Hf.png" style="height:125px;width:130px;border-radius: 50%;margin-top:10px;cursor: pointer; object-fit:cover" />

                    </label>
                    <input type="file" id="picture" name="picture" style="display:none;">

                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter Firstname">
                    <input class="input100" type="text" name="Fname">
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>
                @error('Fname')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror


                <div class="wrap-input100 validate-input" data-validate="Enter Lastname">
                    <input class="input100" type="text" name="Lname">
                    <span class="focus-input100" data-placeholder="Last Name"></span>
                </div>
                @error('Lname')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" data-validate="Enter email">
                    <input class="input100" type="text" name="email" > <!--data-validate = "Email is invalid" -->
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


                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100" type="password"  name="password_confirmation"  >
                    <span class="focus-input100" data-placeholder="Confirm Password"></span>
                </div>
                @error('confirmPassword')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Register
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-15">
                    <span class="txt1">
                        Already have an account?
                    </span>

                    <a class="txt2" href="/" style="color: #0079ca">
                        Sign In
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

@section('js')

<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#picPreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#picture").change(function() {
                readURL(this);
            });
</script>

@endsection


@endsection
