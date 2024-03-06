<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index',[
            'data' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            "kelas" => "required",
        ]);

        Kelas::create($validatedData);
        return redirect("/kelas")->with("success","Data Berhasil Ditambahkan!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function editkelas(Request $request, string $id)
    {
        $data = Kelas::find($id);

        // Simpan data yang telah diedit
        $data->kelas = $request->kelas;
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('kelas_id', $id)->update(['kelas_id' => null]);
        DB::table('kelas')->where('id',$id)->delete();

        return redirect('/kelas')->with('success', 'Data berhasil dihapus.');
    }
}
