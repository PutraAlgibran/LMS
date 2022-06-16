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
    public function uactivity(){
        return $this->hasMany(Activity::class);
    }
}
