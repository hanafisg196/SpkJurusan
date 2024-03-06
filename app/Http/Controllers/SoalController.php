<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\NilaiCF;
use App\Models\SubSoal;
use App\Models\BatchSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $batch = BatchSoal::all();
        $nilaicf = NilaiCF::all();
        $data = Soal::all();

        return view('soal.index')->with([
            'data'=> $data,
            'batch'=> $batch,
            'nilaicf'=> $nilaicf
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
            "jenis" => "required",
            "batch_id" => "required",
            "nilaicf_id" => "required"
        ]);
        $validatedData['jenis'] = strtolower($request->input('jenis'));
        $validatedData['batch_id'] = $request->input('batch_id');

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
        $soal->jenis = strtolower($request->jenis);
        $soal->nilaicf_id = $request->nilaicf_id;
        $soal->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($soal_id)
    {
        DB::table('sub_soals')->where('soal_id',$soal_id)->delete();
        DB::table('soals')->where('id',$soal_id)->delete();

        return redirect('/soal')->with('success', 'Data berhasil Di hapus!');
    }
}
