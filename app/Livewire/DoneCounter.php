<?php

namespace App\Livewire;

use App\Models\Ujian;
use Livewire\Component;

class DoneCounter extends Component

{
  public  $counter = 0;
    public function render()
    {
        $this->buttonChanger();
        return view('livewire.done-counter');

    }

    public function buttonChanger()
    {
        $this->counter = Ujian::where('user_id', auth()->user()->id)->count();
    }
}
