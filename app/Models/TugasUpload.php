<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasUpload extends Model
{
    use HasFactory;

    public $table = "tugas_upload";
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(users::class, 'id', 'user_id');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class, 'id', 'tugas_id');
    }
}
