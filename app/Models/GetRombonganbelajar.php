<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetRombonganbelajar extends Model
{
    use HasUuids;

    protected $guarded = [];

    protected $primaryKey = 'rombongan_belajar_id';
}
