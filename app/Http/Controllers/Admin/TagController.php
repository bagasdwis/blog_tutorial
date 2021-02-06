<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $tag = Tag::all();
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
                'nama_tag' => 'required'
            ]);

            $tag = Tag::create([
                'nama_tag' => $request->nama_tag,
                'slug' => Str::slug($request->nama_tag)
            ]);

            \Session::flash('sukses','Berhasil menambah data tag');
            return redirect('/tag');
        }catch (\Exception $tag){
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findorfail($id);
        return view('admin.tag.edit', compact('tag'));
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
                'nama_tag' => 'required'
            ]);

            $data_kategori = [
                'nama_tag' => $request->nama_tag,
                'slug' => Str::slug($request->nama_tag)
            ];

            Tag::whereId($id)->update($data_kategori);

            \Session::flash('sukses','Berhasil mengubah data tag');
            return redirect('/tag');
        }catch (\Exception $tag){
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
        $tag = Tag::findorfail($id);
        $tag->delete();

        \Session::flash('sukses','Berhasil menghapus data tag');
        return redirect('/tag');
    }
}
