<?php

namespace App\Http\Controllers;

use App\Models\BatchSoal;
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
     return view('ujian.index');
   }

   public function list()
   {
      $batch = BatchSoal::all();
       return view('ujian.list')->with('batch', $batch);
   }
}
