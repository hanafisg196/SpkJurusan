<?php

namespace Database\Seeders;

use App\Models\BatchSoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Batch extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BatchSoal::create([
            'title' => 'Penentuan Jurusan',
            'kode' => '001',
            'enabled' => 0
        ]);
    }
}
