<?php

namespace App\Livewire;

use App\Models\Soal;
use App\Models\NilaiCF;
use Livewire\Component;

class TambahJawaban extends Component
{
    public $datas;
    public $nilaicf;
    public $nilaicf_id;

    protected $rules = [
        'nilaicf_id' => 'required',
    ];
    public function mount()
    {
        $this->datas = Soal::with('subsoal')->get();
        $this->nilaicf = NilaiCF::all();

    }

    public function render()
    {
        return view('livewire.tambah-jawaban');
    }

    public function tambahJawaban(int $id)
    {
        $this->validate([
            'nilaicf_id' => 'required|numeric',
        ]);

        // Simpan subsoal ke dalam database
        $soal = Soal::findOrFail($id);
        $soal->subsoal()->create([
            'nilaicf_id' => $this->nilaicf_id,
        ]);

        // Reset form setelah berhasil menambahkan jawaban
        $this->reset(['nilaicf_id']);
    }

}
