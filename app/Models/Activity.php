<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = "activity";
    protected $fillable = [
        'nama',
        'materi_id',
        'user_id',
        'tugas_id',
    ];
    // 

    public function materi(){
        return $this->belongsTo(Materi::class);
    }
    public function tugas(){
        return $this->belongsTo(Tugas::class);
    }
    public function user(){
        return $this->belongsTo(users::class);
    }
}
