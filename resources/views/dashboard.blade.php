@extends('layouts.master')
@section('content')
@include('includes.messages-block')
<section class="row new-post">
  <div class="col-md-6 offset-md-3">
    <header>
      <h3>What do you have to say?</h3>
    </header>
    <form action="{{ route('post.create') }}" method="post">
      @csrf
      <div class="form-group">
        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
  </div>
</section>
<section class="row posts">
  <div class="col-md-6 offset-md-3">
    <header>
      <h3>What other people say...</h3>
    </header>
    @foreach($posts as $post)
  <article class="post" data-article-id="{{ $post->id }}">
    <p>{{ $post->body }}</p>
      <div class=" info">
      Posted by {{$post->user->name}} on {{$post->created_at}}
  </div>
  <div class="interaction @if($post->user->id === Auth::user()['id'])float-right @endif">
    @if($post->user->id !== Auth::user()['id'])
    <a href="#" >Like</a> |
    <a href="#">Dislike</a>
    @else
    <a href="#" class="edit">Edit</a> | 
    <a href="{{ route('delete.post', ['post_id'=>$post->id]) }}" >Delete</a>
    @endif
  </div>
  </article>
  @endforeach
  </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Post</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="post-body">Edit the Post</label>
            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  var url = '{{route('edit.post')}}';
  var sessionToken ='{{ Session::token() }}';
  console.log(sessionToken);
</script>
@endsection
