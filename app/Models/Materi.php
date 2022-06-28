<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = "materi";
    // 
    protected $guarded = ['id'];

    public function guru()
    {
        return $this->hasOne(Guru::class, 'id', 'guru_id');
    }

    public function activity()
    {
        return $this->hasMany(Activity::class, 'id', 'materi_id');
    }
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id', 'materi_id');
    }
}
