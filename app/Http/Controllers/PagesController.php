<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use App\Models\Pages;
use App\Models\Testimonials;
use App\Models\Partners;
use App\Models\Prices;
use App\Models\Features;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    public function frontpage () {
        $Features = Features::orderBy('id', 'desc')->get();
        $Prices = Prices::orderBy('id', 'asc')->get();
        $Testimonial = Testimonials::first();
        $Testimonials = Testimonials::orderBy('id', 'asc')->skip(1)->take(10)->get();
        $Partners = Partners::orderBy('id', 'desc')->get();
        return view('frontpage', [
            'title'         => 'Home',
            'Services'      => $Features,
            'Testimonial'   => $Testimonial,
            'Testimonials'  => $Testimonials,
            'Prices'        => $Prices,
            'Partners'      => $Partners,
        ]);
    }

    public function details (Request $request) {
        $data = Pages::where('slug', $request->slug)->first();

        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }

        $title = $data->title;
        return view('single-page', [
            'title' => $title,
            'data'  => $data->content,
        ]);
    }

    public function contact () {
        $data = Pages::where('slug', 'contact')->first();

        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }
        $title = 'Contact Us';
        return view('contact', [
            'title' => $title,
            'content' => $data->content,
        ]);
    }

    public function submitContact (Request $request) {
        $datanotif = [
            'name'      => $request->name,
            'email'     => $request->email,
            'msg'       => $request->message,
            'subject'   => 'Form kontak website dari: '.$request->name
        ];
        $SentMail = Mail::send('email-contact', $datanotif, function($message) use ($datanotif)
        {
            $message->to(opsi('email'));
            $message->subject($datanotif['subject']);
        });
        return redirect ('contact')->with("success","Form submitted successfully...");
    }

}