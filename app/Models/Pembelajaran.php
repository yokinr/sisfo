<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasUuids;

    protected $guarded = [];

    function rombel()
    {
        return $this->belongsTo(GetRombonganbelajar::class, 'rombongan_belajar_id');
    }

    function gtk()
    {
        return $this->belongsTo(GetGtk::class, 'ptk_id');
    }
}
