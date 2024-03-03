<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use App\Models\BatchSoal;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function index()
   {
     return redirect('/login');
   }


   public function home()
   {
    $soal = Soal::with('subsoal')->get();
     return view('ujian.index')->with('soal', $soal);
   }

   public function hasil()
    {

        $userId = Auth::id();

        $hasil = Ujian::with('subsoal')
            ->where('user_id', $userId)
            ->get();

        return view('ujian.hasil')->with('hasil', $hasil);
    }

   public function list()
   {
      $batch = BatchSoal::all();
       return view('ujian.list')->with('batch', $batch);
   }

   public function mulai()
   {

        return view('ujian.mulai');
   }
}
