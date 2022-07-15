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
        return $this->belongsToMany(Guru::class, 'materi_kelas');
    }

    public function activity(){
        return $this->belongsToMany(Activity::class, 'id', 'tugas_id');
    }
    
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'materi_kelas');
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
    public function pertemuan()
    {
        return $this->hasMany(Pertemuan::class);
    }
}
