<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = "tugas";
    // 

    public function activity(){
        return $this->hasMany(Activity::class, 'id', 'tugas_id');
    }
}
