<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = "kelas";
    use HasFactory;

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}
