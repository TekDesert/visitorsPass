@extends('layouts.homeLayout')
@section('title', 'Meeting Form')
@section('content')
<div sclass="limiter">
<h1>All meetings</h1>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Profile Image</th>
        <th scope="col">Nature</th>
        <th scope="col">Date</th>
        <th scope="col">Start</th>
        <th scope="col">End</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($meetings as $item )
      <tr>
        <td><img src="assets/images/profiles/{{$item->imageprofile}}" width="40" height="40" class="rounded-circle"/></td>
        <td>{{$item->natureofvisit}}</td>
        <td>{{$item->date}}</td>
        <td>{{$item->starttime}}</td>
        <td>{{$item->endtime}}</td>
        <td>{{$item->type}}</td>
        <td><button type="button" class="btn btn-warning">Edit</button>&nbsp&nbsp<button type="button" class="btn btn-danger">Delete</button></td>
      </tr>
      @endforeach
    </tbody>

  </table>

  {{$meetings->links('pagination::bootstrap-4')}}
</div>

@endsection



