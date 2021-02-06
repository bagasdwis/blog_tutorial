<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Tag;
use App\Models\User;
use App\Models\Komentar;
use Auth;

class BlogController extends Controller
{
   public function index(Post $post){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();

        $data3 = $post->latest()->where('status',1)->get();
        $data2 = $post->latest()->where('status',1)->get()->random(2);
        $data = $post->latest()->take(6)->where('status',1)->get();
        return view('blog.index', compact('data','data2','data3','filter_kategori','filter_tag','filter_user'));
    }

    public function isi_blog($slug){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();
    	$data = Post::with(['komentar', 'komentar.child'])->where('slug', $slug)->where('status',1)->first();

        $next_id = Post::where('status',1)->where('id', '>', $data->id)->min('id');
        $prev_id = Post::where('status',1)->where('id', '<', $data->id)->max('id');
        $artikelterkait = Post::latest()->where('status',1)->get()->random(3);
    	return view('blog.isi_post', compact('data','terbaru','artikelterkait','filter_kategori','filter_tag','filter_user'))->with('next', Post::find($next_id))->with('prev', Post::find($prev_id));
    }

    public function tambah_komentar(Request $request)
    {
        try{
            $this->validate($request, [
                'isi' => 'required',
            ]);

            $komentar = Komentar::create([
                'isi' => $request->isi,
                'user_id' => Auth::id(),
                'post_id' => $request->id,
                'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            ]);

            \Session::flash('sukses','Berhasil mengirim komentar');
            return redirect()->back();
        }catch (\Exception $komentar){
            \Session::flash('gagal','Pastikan semua kolom terisi dengan benar');
        }
        return redirect()->back();
    }

    public function list_blog(){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();

    	$data = Post::latest()->where('status',1);
    	return view('blog.list.index', compact('data','terbaru','filter_kategori','filter_tag','filter_user'));
    }

    public function list_kategori($slug){
        $kategori2 = Kategori::find(request('id'));
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();

        $data = Kategori::where('slug', $slug)->first();
        return view('blog.kategori.index', compact('data','terbaru','filter_kategori','filter_tag','filter_user'));
    }

    public function list_user($slug){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();

        $data = User::where('slug', $slug)->first();
        return view('blog.user.index', compact('data','terbaru','filter_kategori','filter_tag','filter_user'));
    }


    public function list_tag($slug){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();

        $data = Tag::where('slug', $slug)->first();
        return view('blog.tag.index', compact('data','terbaru','filter_kategori','filter_tag','filter_user'));
    }

    public function cari(request $request){
        $filter_kategori = Kategori::all();
        $filter_tag = Tag::all();
        $filter_user = User::all();
        $terbaru = Post::latest()->take(4)->where('status',1)->get();

        $data = Post::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->where('status',1)->paginate(6);
        return view('blog.cari.index', compact('data','terbaru','filter_kategori','filter_tag','filter_user'))->with('cari', request('cari'));
    }
}
