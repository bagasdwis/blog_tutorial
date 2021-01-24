<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Auth;

class UserController extends Controller
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
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function detail_user(Request $request)
    {
        return view('admin.user.show', [
            'user' => $request->user()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            $count_username = User::where('username',$request->input('username'))->count();

            if($count_username>0){
                \Session::flash('gagal', 'Username sudah digunakan');
                return redirect()->back();
            };

            $count_email = User::where('email',$request->input('email'))->count();

            if($count_email>0){
                \Session::flash('gagal', 'Email sudah digunakan');
                return redirect()->back();
            };
            
            $this->validate($request, [
                'level' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required', 'string', 'max:255', 'unique:users',
                'password' => 'required|string|min:5',
            ]);

            if($request->file('foto') == '') {
            $foto = NULL;
            } else {
                $file = $request->file('foto');
                $dt = Carbon::now();
                $acak  = $file->getClientOriginalExtension();
                $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
                $request->file('foto')->move("img/user", $fileName);
                $foto = $fileName;
            }

            $user = User::create([
                'level' => $request->level,
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request['password']),
                'foto' => $foto,
                'slug' => Str::slug($request->name),
            ]);

            \Session::flash('sukses','Berhasil menambah data user');
            return redirect('/user');
        } catch (\Exception $user){
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
        $user = User::findorfail($id);
        return view('admin.user.edit', compact('user'));
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
            $user_data = User::findOrFail($id);

            if($request->file('foto')) 
            {
                $file = $request->file('foto');
                $dt = Carbon::now();
                $acak  = $file->getClientOriginalExtension();
                $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
                $request->file('foto')->move("img/user", $fileName);
                $user_data->foto = $fileName;
            }

            $user_data->name = $request->input('name');
            $user_data->email = $request->input('email');
            if($request->input('password')) {
            $user_data->level = $request->input('level');
            $user_data->slug = Str::slug($request->name);
            }

            if($request->input('password')) {
                $user_data->password= bcrypt(($request->input('password')));
            
            }

            $user_data->update();
            \Session::flash('sukses','Berhasil mengubah data user');
                redirect()->back();
        } catch (\Exception $user_data){
            \Session::flash('gagal',$user_data->getMessage());
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
        $user = User::findorfail($id);
        $user->delete();

        \Session::flash('sukses','Berhasil menghapus data user');
        return redirect('/user');
    }
}
