@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
  <div class="col-sm-8">
    <h1>Sign In</h1>
    <form action="/signin" method="POST">
      @csrf
      <div class="form-group ">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" id="Email" name="Email" aria-describedby="emailHelp" value="{{ Request::old('Email') }}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control" id="Password" name="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="CheckBox" name="CheckBox">
        <label class="form-check-label" for="CheckBox" id="CheckBox">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    @if(count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>
</div>
@endsection
