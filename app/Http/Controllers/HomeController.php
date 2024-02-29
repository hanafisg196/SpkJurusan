<?php

namespace App\Http\Controllers;

use App\Models\BatchSoal;
use App\Models\Soal;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;

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
