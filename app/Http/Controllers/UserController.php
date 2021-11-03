<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use App\Models\User;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:user');
    }

	public function index() {
        $data = User::where('id', auth()->id())->first();
		return redirect ('/')->with("success", "You have successfully logged in...");
	}

}