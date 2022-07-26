<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $table = "user";
    use HasFactory;

    protected $guarded = [];
    // Atau bisa pakai 
    // protected $guarde = ['id'];

    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'user_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'user_id', 'id');
    }

    public function murid()
    {
        return $this->hasOne(Murid::class, 'id', 'user_id');
    }

    // public function tugas()
    // {
    //     return $this->belongsToMany(Tugas::class, 'tugas_upload', 'user_id', 'tugas_id');
    // }

    public function tugas_upload()
    {
        return $this->belongsTo(TugasUpload::class, 'id', 'user_id');
    }
}
