@extends('layouts.master')
@section('content')
<h1>this  is user account page</h1>
@section('content')
  <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
      <header><h3>Your Account</h3></header>
    <form action="{{ route('edit.user') }}" method="post" enctype="multipart/form-data">
      @csrf
          <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control" value="{{ $user->name }}" id="first_name">
          </div>
          <div class="form-group">
              <label for="image">Image (only .jpg)</label>
              <input type="file" name="image" class="form-control" id="image">
          </div>
          <button type="submit" class="btn btn-primary">Save Account</button>
      </form>
    </div>
  </section>
 @include('includes.messages-block')
  @if (Storage::disk('local')->has('photos/'.$user->name . '-' . $user->id . '.jpg'))
    <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
        <img src="{{ route('account.images', ['filename' => $user->name . '-' . $user->id . '.jpg']) }}" class="img-fluid img-thumbnail" >
      </div>
    </section>
  @endif
@endsection
@endsection