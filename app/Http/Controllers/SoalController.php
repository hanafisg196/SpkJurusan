<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('soal.index',[
            "data" => Soal::latest()->get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            "kode" => "required",
            "soal" => "required",
            "jenis" => "required"
        ]);
        Soal::create($validatedData);
        return redirect("/soal")->with("success","Data Berhasil Ditambahkan!");
    }

    /**
     * Display the specified resource.
     */

    public function editsoal(Request $request, $id)
    {
        $soal = Soal::find($id);

        // Simpan data yang telah diedit
        $soal->kode = $request->kode;
        $soal->soal = $request->soal;
        $soal->jenis = $request->jenis;
        $soal->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Temukan data kegiatan berdasarkan ID
         $soal = Soal::find($id);

         // Jika data soal ditemukan, lakukan penghapusan
         if ($soal) {
             $soal->delete();
             return redirect('/soal')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
         } else {
             return redirect('/soal')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
         }
    }
}
