<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\Ujian;
use Livewire\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Kerjakanujian extends Component
{
    public $user_id;
    public $subsoal_id;


    public function mount()
    {
        $this->user_id = auth()->user()->id;
        $currentPage = request()->has('page') ? request()->query('page') : 1;
        $this->subsoal_id = Session::get('jawaban_' . $currentPage);
    }

    public function render()
    {
        return view('livewire.kerjakanujian',[
            "soal" => Soal::with('subsoal')->paginate(1)
        ]);

    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required',
            'subsoal_id' => 'required'
        ]);

        $currentPage = request()->has('page') ? request()->query('page') : 1;
        Session::put('jawaban_' . $currentPage, $this->subsoal_id);

        Ujian::updateOrCreate([
            'user_id' => $this->user_id,
            'subsoal_id' => $this->subsoal_id
        ]);

        // Retrieve the current 'id' parameter from the URL
        $id = 1;

        // Move to the next question by incrementing the 'page' parameter
        $this->redirect(route('kerjakan.edit.page', ['id' => $id, 'page' => $currentPage + 1]));

    }



}
