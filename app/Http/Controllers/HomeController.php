<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\BatchSoal;
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
     return view('ujian.index')->with(['soal' => $soal]);
   }

   public function hasil()
    {

        $userId = Auth::id();

        $hasil = Ujian::with('subsoal')
            ->where('user_id', $userId)
            ->get();

        $jrs = Jurusan::where('user_id', $userId)->get();
        return view('ujian.hasil')->with(['hasil'=> $hasil, 'jrs' => $jrs]);
    }

    public function print()
    {

        $userId = Auth::id();

        $hasil = Ujian::with('subsoal')
            ->where('user_id', $userId)
            ->get();

        return view('ujian.print')->with('hasil', $hasil);
    }

    public function tambahjurusan(Request $request)
    {
        $user_id = Auth::id();
        $validatedData = $request->validate([
            'jurusan' => 'required',
            'kepribadian' => 'required',
        ]);

        $validatedData['user_id'] = $user_id;

        Jurusan::updateOrCreate(
            ['user_id' => $user_id],
            $validatedData
        );
        return redirect('/hasilsiswa');
    }

   public function list()
   {
       $batch = BatchSoal::all();

       return view('ujian.list')->with('batch', $batch);
   }

   public function mulai()
   {

    $ujian = Ujian::where('user_id', auth()->user()->id)->count();
    if($ujian == 1)
    {
     return redirect('/hasilsiswa');
    }
        return view('ujian.mulai');
   }
}
