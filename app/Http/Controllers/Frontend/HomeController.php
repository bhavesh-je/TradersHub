<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\FAQ;
use App\Models\Post;
use App\Models\VideoPost;
use DB;

class HomeController extends Controller
{
    //

    public function getFaqs()
    {
        $faqs = FAQ::orderBy('id', 'desc')->get();
        return Inertia::render('Faq', ['faqs' => $faqs]);
    }

    public function index(Request $request)
    {
        // dd($request->all());
        // $userAuth = Auth::user()->getRoleNames();
        $maxlen = Post::where('post_status', 1)->count();
        // $allPost = Post::where('post_status',1)->limit(5)->get();
        $allPost = Post::where('post_status', 1)->orderBy('id', 'desc')->get();

        return Inertia::render('Dashboard', [Auth::user()->getRoleNames(), 'posts' => $allPost, 'maxlen' => $maxlen]);
    }

    public function postget(Request $request)
    {
        // dd($request->all());
        // DB::enableQueryLog();
        // $getData = $request->all();

        $allPost = Post::where('post_status', 1)->skip($request->from)->limit($request->to)->get();
        // dd(DB::getQueryLog());
        // dd($rallPost);

        return response()->json($allPost);
    }

    public function show($id)
    {
        // $showPost = Post::where('id',$id)->get();
        $showPost = Post::find($id);
        return Inertia::render('Post', ['posts' => $showPost]);
    }

    public function videoPosts()
    {
        $videoPosts = VideoPost::orderBy('id', 'desc')->get();
        $maxlength = count($videoPosts);
        return Inertia::render('Videos', ['videoPosts' => $videoPosts, 'maxlength' => $maxlength]);
    }

    public function getPodcast()
    {
        return Inertia::render('Podcast');
    }
}