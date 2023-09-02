<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetGtk extends Model
{
    use HasUuids;

    protected $guarded = [];

    protected $primaryKey = 'ptk_id';
}
