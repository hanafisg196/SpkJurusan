<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSoal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id' ;
    protected $guarded = ['id'];

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id', 'id');
    }

    public function nilaicf()
    {
        return $this->belongsTo(NilaiCF::class, 'nilaicf_id','id');
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class, 'subsoal_id','id');
    }
}
