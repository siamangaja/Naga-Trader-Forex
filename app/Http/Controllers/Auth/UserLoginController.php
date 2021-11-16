<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Route;

class UserLoginController extends Controller
{

    //use AuthenticatesUsers;

    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('auth.user_login');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        if (Auth::guard('user')->user()->status == 0) {
          Auth::guard('user')->logout();
          return redirect()->back()->with("error","Akun Anda belum diaktivasi...");
        } elseif (Auth::guard('user')->user()->status == 2) {
          Auth::guard('user')->logout();
          return redirect()->back()->with("error","Akun Anda diblokir...");
        }

        return redirect()->route('user.dashboard');
      }
      return redirect()->back()->withInput($request->only('email', 'remember'))->with("error","Email atau password salah...");
    }

    public function logout()
    {
        auth()->guard('user')->logout();
        session()->flush();
        return redirect()->route('login');
    }

}