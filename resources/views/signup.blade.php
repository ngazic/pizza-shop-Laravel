@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
  <div class="col-sm-8">
    <h1>Sign up</h1>
    <form action="/signup" method="POST">
      @csrf
      <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control {{ ($errors->has('Email')) ? "border border-danger" : '' }}" id="Email" name="Email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" id="Name" name="Name">
      </div>
      <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" class="form-control {{ ($errors->has('Password')) ? "border border-danger" : '' }}" id="Password" name="Password">
      </div>
      <div class="form-group">
        <label for="ConfirmPassword">Confirm password</label>
        <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="CheckBox" name="CheckBox">
        <label class="form-check-label" for="CheckBox" id="CheckBox">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
