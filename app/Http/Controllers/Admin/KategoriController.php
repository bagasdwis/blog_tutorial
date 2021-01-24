<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
                'nama_kategori' => 'required'
            ]);

            $kategori = Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'slug' => Str::slug($request->nama_kategori)
            ]);

            \Session::flash('sukses','Berhasil menambah data kategori');
            return redirect('/kategori');
        }catch (\Exception $kategori){
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
        $kategori = Kategori::findorfail($id);
        return view('admin.kategori.edit', compact('kategori'));
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
                'nama_kategori' => 'required'
            ]);

            $data_kategori = [
                'nama_kategori' => $request->nama_kategori,
                'slug' => Str::slug($request->nama_kategori)
            ];

            Kategori::whereId($id)->update($data_kategori);

            \Session::flash('sukses','Berhasil mengubah data kategori');
            return redirect('/kategori');
        }catch (\Exception $kategori){
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
        $kategori = Kategori::findorfail($id);
        $kategori->delete();

        \Session::flash('sukses','Berhasil menghapus data kategori');
        return redirect('/kategori');
    }
}
