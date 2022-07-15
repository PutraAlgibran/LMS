<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasUpload extends Model
{
    public $table = "tugas_upload";
    use HasFactory;

    protected $guarded = [];
}
