<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(users::class, 'id', 'user_id');
    }
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }
}
