<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Tag;
use Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(Auth::user()->level == 'penulis')
        {
            $post = Post::where('user_id', Auth::user()->id)
                                ->get();
        } else {
            $post = Post::all();
        }
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $data = Post::whereId($id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang == 1){
            Post::whereId($id)->update([
                'status'=>0
            ]);
        }else{
            Post::whereId($id)->update([
                'status'=>1
            ]);
        }
        \Session::flash('sukses','Berhasil mengubah data post');
 
        // alihkan halaman kembali
        return redirect()->back();
    }
    public function create()
    {
        $tag = Tag::all();
        $kategori = Kategori::all();
        return view('admin.post.create', compact('kategori','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'judul' => 'required',
                'kategori_id' => 'required',
                'konten' => 'required',
                'gambar' => 'required',
            ]);

            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();

            $post = Post::create([
                'judul' => $request->judul,
                'kategori_id' =>  $request->kategori_id,
                'konten' =>  $request->konten,
                'gambar' => 'img/post/'.$new_gambar,
                'slug' => Str::slug($request->judul),
                'user_id' => Auth::id(),
                'status' => $request->status,
            ]);

            $post->tag()->attach($request->tag);

            $gambar->move('img/post/', $new_gambar);
            \Session::flash('sukses','Berhasil menambah data post');
            return redirect('/post');
        }catch (\Exception $post){
            \Session::flash('gagal','Pastikan semua kolom terisi dengan benar');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.show', compact('post','tag','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $post = Post::findorfail($id);
        return view('admin.post.edit', compact('post','tag','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, [
            'judul' => 'required',
            'kategori_id' => 'required',
            'konten' => 'required',       
             ]);

            $post = Post::findorfail($id);

            if ($request->has('gambar')) {
                $gambar = $request->gambar;
                $new_gambar = time().$gambar->getClientOriginalName();
                $gambar->move('img/post/', $new_gambar);

            $post_data = [
                'judul' => $request->judul,
                'kategori_id' =>  $request->kategori_id,
                'konten' =>  $request->konten,
                'gambar' => 'img/post/'.$new_gambar,
                'slug' => Str::slug($request->judul),
                'status' => $request->status,
            ];
            }
            else{
            $post_data = [
                'judul' => $request->judul,
                'kategori_id' =>  $request->kategori_id,
                'konten' =>  $request->konten,
                'slug' => Str::slug($request->judul),
                'status' => $request->status,
            ];
            }
        

            $post->tag()->sync($request->tag);
            $post->update($post_data);

            \Session::flash('sukses','Berhasil mengubah data post');
            return redirect('/post');
        }catch (\Exception $post){
            \Session::flash('gagal','Pastikan semua kolom terisi dengan benar');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        \Session::flash('sukses','Berhasil menghapus data post (Silahkan cek data sampah post)');
            return redirect('/post');
    }

    public function sampah(){
        if(Auth::user()->level == 'penulis')
        {
            $post = Post::onlyTrashed()->where('user_id', Auth::user()->id)
                                ->get();
        } else {
            $post = Post::onlyTrashed()->get();
        }
        return view('admin.post.delete', compact('post'));
    }

    public function restore_sampah($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        \Session::flash('sukses','Berhasil mengembalikan data post (Silahkan cek data post)');
            return redirect('/sampah');
    }

    public function hapus_permanen($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        \Session::flash('sukses','Berhasil menghapus permanen data post');
            return redirect('/sampah');
    }
}
