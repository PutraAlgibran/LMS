<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $table = "user";
    use HasFactory;

    protected $guarded = ['id'];
    // Atau bisa pakai 
    // protected $guarde = ['id'];
    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function guru(){
        return $this->hasMany(Guru::class);
    }

    public function absensi(){
        return $this->hasOne(Absensi::class, 'user_id','id');
    }
}
