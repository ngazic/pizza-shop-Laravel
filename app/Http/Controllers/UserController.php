<?php

namespace App\Http\Controllers;

use App\User;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

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

}