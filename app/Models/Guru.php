<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';

    public function user()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }

    public function materi()
    {
        return $this->belongsToMany(Materi::class);
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
