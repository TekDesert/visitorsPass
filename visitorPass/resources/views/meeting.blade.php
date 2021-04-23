@extends('layouts.homeLayout')
@section('title', 'Meeting Form')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="POST" action="{{ route('meetingPost') }}" enctype="multipart/form-data">
                @csrf

                <span class="login100-form-title p-b-26">
                    Meeting Schedule Form
                </span>

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="nature">
                    <span class="focus-input100" data-placeholder="Nature of visit"></span>
                </div>
                @error('nature')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    Date of meeting : <input class="input100" type="date" name="date">
                    <span class="focus-input100" data-placeholder=""></span>
                </div>
                @error('date')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    Start Time : <input class="input100" type="time" name="start">
                    <span class="focus-input100" data-placeholder=""></span>
                </div>
                @error('start')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    End Time : <input class="input100" type="time" name="end">
                    <span class="focus-input100" data-placeholder=""></span>
                </div>
                @error('end')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror


                <div class="wrap-input100 validate-input" >
                    Individual : <input type="radio" name="type" value="individual">
                    Company : <input type="radio" name="type" value="company">
                </div>
                @error('type')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror


                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="company" >
                    <span class="focus-input100" data-placeholder="Company Name"></span>
                </div>
                @error('company')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror


                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="person" >
                    <span class="focus-input100" data-placeholder="Person Name"></span>
                </div>
                @error('person')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="number" >
                    <span class="focus-input100" data-placeholder="Mobile Number"></span>
                </div>
                @error('number')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <div class="wrap-input100 validate-input" >
                    <textarea class="input100" name="others" rows=4></textarea>
                    <span class="focus-input100" data-placeholder="Other people"></span>
                </div>
                @error('others')
                    <div class="uk-text-danger">{{ $message }}</div>
                @enderror

                <label for="picture">

                    <img id="picPreview" src="https://i.stack.imgur.com/l60Hf.png" style="height:125px;width:130px;border-radius: 50%;margin-top:10px;cursor: pointer; object-fit:cover;" />

                </label>
                <input type="file" id="picture" name="picture" style="display:none;">

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Confirm Meeting
                        </button>
                    </div>
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
