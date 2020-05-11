<?php
namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller {

  public function getDashboard() {
    // $posts = Post::all();
    $posts = Post::orderBy('updated_at', 'desc')
      ->get();
    return view('dashboard', ['posts' => $posts]);
  }

  public function postCreatePost() {
    $this->validate(request(),
      [
        'body' => 'required|max:1000',

      ]
    );
    $post = new Post();
    $post->body = request('body');
    $message = "Error posting the message!!!";
    if (request()->user()->posts()->save($post)) {
      $message = "Post saved successfully.";
    }
    return redirect()->route('dashboard')->with(['message' => $message]);
  }

  public function getDeletePost($post_id) {
    $post = Post::firstWhere('id', $post_id);
    $message = 'Error deleting post';
    if ($post->user->id === auth()->user()->id) {
      $post->delete();
      $message = 'Post deleted';
      return redirect()->back()->with(['message' => $message]);
    }
    return redirect()->back()->with(['message' => $message]);
  }

  public function postEditPost() {
    $this->validate(request(),
      [
        'body' => 'required',
      ]
    );
    $post = Post::firstWhere('id', request('id'));
    $post->body = request('body');
    $post->update();
    return response()->json(
      ['body' => request('body'),
        'id' => request('id'),
      ]
    );

  }

}