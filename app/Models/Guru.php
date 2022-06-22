<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'teacher';

    public function materi(){
        return $this->hasOne(materi::class);
    }

    public function user(){
        return $this->hasMany(user::class);
    }
}
