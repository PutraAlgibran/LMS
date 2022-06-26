<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensi";

    public function users(){
        return $this->belongsTo(users::class, 'user_id', 'id');
    }
}
