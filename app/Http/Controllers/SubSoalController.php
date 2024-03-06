<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\NilaiCF;
use App\Models\SubSoal;
use Illuminate\Http\Request;

class SubSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Soal::with('subsoal')->latest()->get();
        $nilaicf = NilaiCF::all();

        return view('subsoal.index', compact('datas','nilaicf'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function tambahjawaban(Request $request, $id)
    {
        // Validasi input subsoal
        $request->validate([
            'nilaicf_id' => 'required',
        ]);

        // Simpan subsoal ke dalam database
        $soal = Soal::findOrFail($id);
        $soal->subsoal()->create([
            'nilaicf_id' => $request->nilaicf_id,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect('/subsoal')->with('success', 'Jawaban berhasil ditambahkan.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan data kegiatan berdasarkan ID
        $subsoal = SubSoal::find($id);

        // Jika data soal ditemukan, lakukan penghapusan
        if ($subsoal) {
            $subsoal->delete();
            return redirect('/subsoal')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
        } else {
            return redirect('/subsoal')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
        }
   }
}
