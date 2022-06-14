<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    public $table = "user";
    use HasFactory;

    protected $fillable = [
        'fullname', 'role', 'username', 'email', 'telpon', 'alamat', 'password', 'foto'
    ];
}
