<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Auth;
use App\Models\News;

class NewsController extends Controller
{

    public function index() {
        $data = News::orderBy('id', 'desc')->where('status', 1)->paginate(12);
        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }
        $title = 'News';
        return view('news-index', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    public function details (Request $request) {
        $data = News::where('slug', $request->slug)->first();

        if (!$data) {
            return response()->json([
                'status' => '404',
                'message' => 'Page not found',
            ]);
        }

        $title = $data->title;
        return view('news-single', [
            'title' => $title,
            'data'  => $data,
        ]);
    }

}