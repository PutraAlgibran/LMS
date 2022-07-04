<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";

    protected $guarded = ['id'];

    public function materi()
    {
        return $this->belongsToMany(Materi::class, 'materi_kelas');
    }
    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'materi_kelas');
    }

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }
}
