<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = "tugas";
    // 
    protected $guarded = [];
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function pertemuan()
    {
        return $this->belongsTo(Materi::class);
    }
}
