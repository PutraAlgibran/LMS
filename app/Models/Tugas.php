<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = "tugas";
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
    // public function user()
    // {
    //     return $this->belongsToMany(users::class, 'tugas_upload', 'tugas_id', 'user_id');
    // }


    public function tugas_upload()
    {
        return $this->belongsTo(TugasUpload::class, 'id', 'tugas_id');
    }
}
