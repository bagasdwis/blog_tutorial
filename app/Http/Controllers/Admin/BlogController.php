<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\User;

class BlogController extends Controller
{
    public function index(Post $post){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data2 = $post->latest()->take(3)->where('status',1)->get();
        $post_admin =  $post->where('user_id','1')->where('status',1)->get();
    	$data = $post->latest()->take(6)->where('status',1)->get();
    	return view('blog.blog', compact('data','data2','post_admin','filter_kategori','filter_tag','filter_user'));
    }
    public function isi_blog($slug){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        
    	$data = Post::where('slug', $slug)->where('status',1)->get();
    	return view('blog.isi_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }

    public function list_blog(){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

    	$data = Post::latest()->where('status',1)->paginate(6);
    	return view('blog.list_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }

    public function list_kategori(Kategori $kategori){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data = $kategori->post()->where('status',1)->paginate(6);
        return view('blog.list_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }

    public function list_user(User $user){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data = $user->post()->where('status',1)->paginate(6);
        return view('blog.list_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }


    public function list_tag(Tag $tag){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data = $tag->post()->where('status',1)->paginate(6);
        return view('blog.list_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }

    public function cari(request $request){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data = Post::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->where('status',1)->paginate(6);
        return view('blog.list_post', compact('data','filter_kategori','filter_tag','filter_user'));
    }
}
