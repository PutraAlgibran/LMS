<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    protected $table = 'pertemuan';
    use HasFactory;

    protected $guarded = [];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
