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

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function guru(){
        return $this->belongsTo(Guru::class);
    }
}
