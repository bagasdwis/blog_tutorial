<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tot_kategori = Kategori::count();
        $tot_tag = Tag::count();
        $tot_user = User::count();
        $tot_post = Post::count();
        if(Auth::user()->level == 'penulis')
        {
            $post = Post::whereNull('status')->where('user_id', Auth::id())->get();
        } else {
            $post = Post::where('status', 0)->orWhereNull('status')->get();
        }
        return view('admin.home.index', compact('post','tot_post','tot_kategori','tot_tag','tot_user'));
    }
}
