<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cari = User::latest()->where('role','siswa');

        if (request('search')) {
            $cari->where('name','LIKE','%'.$request->search.'%')
            ->orWhere('username','LIKE','%'.$request->search.'%');
        }

        return view('siswa.index',[
            'data' => $cari->paginate(10),
            'kelas' => Kelas::all()
        ]);
    }

    public function filter($id)
    {
        $data = User::with('kelas')->where('kelas_id', $id)->paginate(10);


        return view('siswa.filter', [
            'data' => $data,
            'kelas' => Kelas::all(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function editsiswa(Request $request, $id)
    {
        $siswa = User::find($id);

        // Simpan data yang telah diedit
        $siswa->name = $request->name;
        $siswa->username = $request->username;
        $siswa->password = Hash::make($request['password']);
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->role = $request->role;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required',
            'kelas_id' => 'required',
            'password' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required'
        ]);

        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['role'] = 'siswa';

        //dd($validatedData);

        User::create($validatedData);

        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {

        DB::table('ujians')->where('user_id',$user_id)->delete();
        DB::table('jurusans')->where('user_id',$user_id)->delete();
        DB::table('users')->where('id',$user_id)->delete();

        return redirect('/siswa')->with('success', 'Data berhasil Di hapus!');
   }
}
