<?php

namespace App\Livewire;

use App\Models\Jurusan;
use App\Models\Soal;
use App\Models\Ujian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
class Quiz extends Component
{

    public $soals;
    public $selectedSoal;
    public $ujian;
    public $currentIndex;
    public $radioButton = "radioButton";
    public $colorChangeButton  = "colorChangeButton";
    public $selectedAnswer;
    public $color;
    public $count = 0;
    public $doneButtonVisibility = true;
    protected $listeners = ['refreshQuiz' => 'render'];



    public function render()
    {
        $this->soals = Soal::with('ujian')->get();

        //take first id for soals
        if (!$this->selectedSoal && count($this->soals) > 0) {
            $this->selectedSoal = $this->soals->first();
        }

        $this->previousAnswer();
        $this->buttonColor();
        $this->answerCounter();

        $this->buttonDoneVisibility();


        return view('livewire.quiz');
    }

    public function selectSoal($soalId)
    {
         $this->selectedSoal = $this->soals->find($soalId);
         $this->ujian;



    }



    public function selectAnswer($subSoalId, $selectedAnswer)
    {
        // Check if the user has answered this question before
        $this->ujian;


        if ($this->ujian) {
            // If the user has answered, update the answer
            $this->ujian->update(['subsoal_id' => $subSoalId, 'selected_answer' => $selectedAnswer]);



        } else {
            // If not, create a new answer record
            Ujian::create([
                'user_id' => auth()->user()->id,
                'soal_id' => $this->selectedSoal->id,
                'subsoal_id' => $subSoalId,
                'selected_answer' => $selectedAnswer,
            ]);



        }

        // Emit an event to refresh the quiz for other components or if the page is refreshed
        $this->dispatch('refreshQuiz');
    }

    public function selectNextQuestion()
    {
        //search id from soals
        $this->currentIndex = $this->soals->search(function ($soal){
            return $soal->id == $this->selectedSoal->id;

        });
        //plus one id (id + 1)
        if ($this->currentIndex !== false && $this->currentIndex + 1 < count($this->soals)) {
            $this->selectedSoal = $this->soals[$this->currentIndex + 1];

        }

    }

    public function selectPrevQuestion()
    {
        //search id from soals
        $this->currentIndex = $this->soals->search(function ($soal){
            return $soal->id == $this->selectedSoal->id;

        });
        //less one id (id - 1)
        if ($this->currentIndex !== false &&  $this->currentIndex - 1 >= 0
        && $this->currentIndex -1 < count($this->soals)) {
            $this->selectedSoal = $this->soals[ $this->currentIndex - 1];
        }

    }

    public function buttonColor()
    {
        $this->color = Ujian::where('user_id', auth()->user()->id)->get();
    }

    public function previousAnswer()
    {
         // Retrieve the user's previous answer for the current question

         $this->ujian = Ujian::where('soal_id', $this->selectedSoal->id)
         ->where('user_id', auth()->user()->id)
         ->first();
         $this->selectedAnswer = $this->ujian ?  $this->ujian->selected_answer : null;
    }


    public function answerCounter()
    {
        $this->count = Ujian::where('user_id', auth()->user()->id)->count();

    }
    public function buttonDoneVisibility()
    {
        $this->count;

        if($this->count == 1)
        {
         $this->doneButtonVisibility = false;
        }

    }
    public function doneExam(Request $request)
    {
        // $user_id = Auth::id();
        // $validatedData = $request->validate([
        //     'jurusan' => 'required',
        // ]);

        // $validatedData['user_id'] = $user_id;

        // Jurusan::create($validatedData);
        // $request->session()->flash('success','tambah data berhasil');
        return redirect('/hasilsiswa');
    }



}



