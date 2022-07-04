<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murid';

    public function user()
    {
        return $this->belongsTo(users::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'kelas_id', 'id');
    }
}
