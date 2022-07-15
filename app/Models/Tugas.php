<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = "tugas";
    // 
<<<<<<< HEAD
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
=======

    public function activity(){
        return $this->belongsToMany(Activity::class, 'id', 'tugas_id');
>>>>>>> de1b7371f3e6876ab914d16480249a1e1bb45518
    }
}
