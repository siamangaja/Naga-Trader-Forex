<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UserRegisterController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }
    
    public function showRegisterForm()
    {
      return view('auth.user_register');
    }

    public function register(Request $request)
    {
      $this->validate($request, [
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      $user = new User();
      $user->name           = $request->name;
      $user->email          = $request->email;
      $user->password       = Hash::make($request->password);
      $user->status         = 1;
      $user->remember_token = Str::random(100);
      $user->save();

      // Verifikasi email pendaftaran User:
      // $datanotif = [
      //     'name'    => $user->name,
      //     'email'   => $user->email,
      //     'link'    => $user->remember_token,
      //     'subject' => 'Verifikasi Pendaftaran Akun'
      // ];

      // $SentMail = Mail::send('mail.01-verifikasi-pendaftaran', $datanotif, function($message) use ($datanotif)
      // {
      //     $message->to($datanotif['email']);
      //     $message->subject($datanotif['subject']);
      // });

      return redirect()->route('login')->with("success","Pendaftaran berhasil. Silahkan login...");

    }

    public function verifyRegister (Request $request) {
      $user = User::where([
        ['remember_token', $request->token],
        ['status', 0]
      ])->first();

      if (!$user) {
        return redirect()->route('login');
      }

      //Update status user
      $update = User::where('id', $user->id)
      ->update([
        'status'  => 1,
        'verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);

      // Notifikasi email pendaftaran sukses User:
      // $datanotif = [
      //     'name'    => $user->name,
      //     'email'   => $user->email,
      //     'link'    => $user->remember_token,
      //     'subject' => 'Pendaftaran Akun Berhasil'
      // ];

      // $SentMail = Mail::send('mail.02-notifikasi-pendaftaran-sukses', $datanotif, function($message) use ($datanotif)
      // {
      //     $message->to($datanotif['email']);
      //     $message->subject($datanotif['subject']);
      // });

      // Notifikasi email pendaftaran sukses User:
      // $NotifAdmin = [
      //     'name'    => $user->name,
      //     'email'   => $user->email,
      //     'subject' => 'Pendaftaran Akun Baru'
      // ];

      // $SentMailAdmin = Mail::send('mail.admin.01-notifikasi-pendaftaran-user', $NotifAdmin, function($message) use ($NotifAdmin)
      // {
      //     $message->to(config('app.email'));
      //     $message->subject($NotifAdmin['subject']);
      // });

      return redirect()->route('login')->with("success","Verifikasi akun berhasil. Silahkan login...");
    }

    public function resetPassword (Request $request) {
      $user = User::where([
        ['email', $request->email],
        ['status', 1]
      ])->first();

      if (!$user) {
        return redirect()->route('login')->with("error","Maaf, kami tidak menemukan data Anda...");
      }

      //Update password user
      $newpassword = Str::random(10);
      $update = User::where('id', $user->id)
      ->update([
        'password'  => Hash::make($newpassword),
      ]);

      // Notifikasi email reset password:
      // $datanotif = [
      //     'name'      => $user->name,
      //     'email'     => $user->email,
      //     'password'  => $newpassword,
      //     'subject'   => '['.config('app.name').'] Reset Password'
      // ];

      // $SentMail = Mail::send('mail.03-reset-password', $datanotif, function($message) use ($datanotif)
      // {
      //     $message->to($datanotif['email']);
      //     $message->subject($datanotif['subject']);
      // });

      return redirect()->route('login')->with("success","Reset password berhasil. Silahkan periksa email Anda...");
    }

}