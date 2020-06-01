<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
  // 7 CRUD API convention for rest: index, show, create, store, edit, update , destroy

  public function signUp() {
    // validation
    $this->validate(request(),
      ['Email' => 'required|email|unique:users',
        'Name' => 'required|max:30',
        'Password' => 'required|min:4',
      ]);

    $user = new User();
    $user->email = request('Email');
    $user->name = request('Name');
    $user->password = bcrypt(request('Password'));
    $user->save();
    Auth::login($user);
    return redirect('/dashboard');
  }

  public function signIn() {
    // validation
    $this->validate(request(),
    ['Email' => 'required|email',
      'Password' => 'required|min:4',
    ]);
    request()->flash();

    if (Auth::attempt(['email' => request('Email'), 'password' => request('Password')])) {
      return redirect('/dashboard');
    }
    return redirect()->back();

  }

  public function signOut() {
    Auth::logout();
    return redirect('/');
  }

  public function getUser() {
    return view('user-account',
      [
        'user' => Auth::user(),
      ]
    );
  }

  public function postEditUser() {
    $this->validate(request(), [
      'first_name' => 'required'
    ]);
    $message = 'Error editing user data.';
    $user = Auth::user();
    $old_name = $user->name;
    $user->name = request('first_name');
    if($user->update()) {
      $message = 'Successfully edited user data';
    }
    $file = request()->file('image');
    $file_name = request('first_name').'-'.$user->id.'.jpg';
    $old_file_name = $old_name.'-'.$user->id.'.jpg';
    if($file) {
      Storage::putFileAs('photos', $file, $file_name);
    }
   

    return redirect()->route('user')->with(['message' => $message]);
  }

  public function getImage($filename) {

    $file = Storage::disk('local')->get('photos/Nihad-2.jpg');
    return new Response($file, 200);
    return 'string';
    // return Storage::url('a.jpg');
  }

}