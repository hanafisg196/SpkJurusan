<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function subsoal()
    {
        return $this->belongsTo(SubSoal::class, 'subsoal_id','id');
    }

    public function nilaicf()
    {
        return $this->belongsTo(NilaiCF::class, 'nilaicf_id','id');
    }


}
