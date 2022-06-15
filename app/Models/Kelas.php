<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = "kelas";
    use HasFactory;

    protected $fillable = [
        'nama', 'jam_mulai', 'jam_berakhir', 'keterangan'
    ];

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
