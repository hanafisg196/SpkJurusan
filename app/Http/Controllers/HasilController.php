<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('hasil.index',[
            'data' => Jurusan::all(),
            'kelas' => Kelas::all()

        ]);
    }

    public function print()
    {
        return view('hasil.print',[
            'data' => Jurusan::all(),
            'kelas' => Kelas::all()

        ]);
    }

    public function filter($id)
    {
        $kelas = Kelas::find($id);
        $data = Jurusan::with(['user.kelas' => function ($query) use ($kelas) {
            $query->where('id', $kelas->id);
        }])->get();


        return view('hasil.filter', [
            'data' => $data,
            'kelas' => Kelas::all(),
            'selected_kelas' => $kelas,
        ]);
    }

    public function printfilter($id)
    {
        $kelas = Kelas::find($id);
        $data = Jurusan::with(['user.kelas' => function ($query) use ($kelas) {
            $query->where('id', $kelas->id);
        }])->get();


        return view('hasil.printfilter', [
            'data' => $data,
            'kelas' => Kelas::all(),
            'selected_kelas' => $kelas,
        ]);
    }
}
