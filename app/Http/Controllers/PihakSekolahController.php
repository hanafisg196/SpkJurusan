<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PihakSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = User::latest()->where('role','guru');

        if (request('search')) {
            $cari->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('username','LIKE','%'.$request->search.'%');
        }

        return view('pihaksekolah.index',[
            'data' => $cari->paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'role' => 'required'
        ]);

        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        //dd($validatedData);

        User::create($validatedData);

        return redirect('/pihaksekolah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editpihaksekolah(Request $request, $id)
    {
        $user = User::find($id);

        // Simpan data yang telah diedit
        $user->name = $request->name;
        $user->username = $request->username;
        $user->jabatan = $request->jabatan;
        $user->password = Hash::make($request['password']);
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {

        DB::table('ujians')->where('user_id',$user_id)->delete();
        DB::table('jurusans')->where('user_id',$user_id)->delete();
        DB::table('users')->where('id',$user_id)->delete();

        return redirect('/pihaksekolah')->with('success', 'Data berhasil Di hapus!');
   }
}
