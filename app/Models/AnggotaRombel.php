<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AnggotaRombel extends Model
{
    use HasUuids;

    protected $guarded = [];

    protected $primaryKey = 'anggota_rombel_id';
}
