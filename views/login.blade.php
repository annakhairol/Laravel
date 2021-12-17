@extends('header')
@section('login')

    <!-- @include('message') -->
    @if(Session::has('success'))

        <div class="alert alert-success">

            {{Session::get('success')}}

        </div>

    @elseif(Session::has('error'))

    <div class="alert alert-danger">

        {{Session::get('error')}}
        
    </div>

    @endif
<form action="login" method="post">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <!-- <button class="btn btn-secondary"> -->
    <a href="/register">Register</a>
  <!-- </button> -->
</form>

@endsection