<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quiz extends Component
{
    public $soals;
    public $selectedSoal;
    public $selectedAnswer;

 

    public function render()
    {
        $this->soals = Soal::with('subsoal')->get();
   

        return view('livewire.quiz');
    }

    public function selectSoal($soalId)
    {
        $this->selectedSoal = $this->soals->find($soalId);
        $this->selectedAnswer = null;
        
    }


    public function selectAnswer($subSoalId, $selectedAnswer)
    {
        $user = Auth::user();
        // check answr exist or not
        $ujian = Ujian::where('soal_id', $this->selectedSoal->id)->first();
        
        if ($ujian) {
            // if answer is exist update properties
            $ujian->update(['subsoal_id' => $subSoalId, 'selected_answer' => $selectedAnswer]);
        } else {
            // if doesnt exist creta new properties
            Ujian::create([
                'user_id' => $user->id,
                'soal_id' => $this->selectedSoal->id,
                'subsoal_id' => $subSoalId,
                'selected_answer' => $selectedAnswer,
            ]);
        }
    
        $this->selectedAnswer = $selectedAnswer;
    }

  
}
