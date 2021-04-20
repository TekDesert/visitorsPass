@extends('layouts.indexLayout')
@section('title', 'Home page')
@section('content')

<div class="row d-flex justify-content-center" style="min-height:200px;background-color:#0079ca; color:white">
    <h1>
        Hello home ! -
    </h1>

    <a href="{{ route('logout') }}" style="color:white" >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        <span > Logout </span>
    </a>

    <img src="{{ env('IMGPATH') }}{{ auth()->user()->userpicture}}" style="object-fit:cover; height: 200px; width:200px" >


</div>


@endsection
