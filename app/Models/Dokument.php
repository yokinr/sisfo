<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokument extends Model
{
    use HasUuids;

    protected $guarded = [];
    protected $primaryKey = 'dokument_id';

    public function gtk()
    {
        return $this->hasOne(GetGtk::class, 'ptk_id')->latest();
    }

    public function peserta_didik()
    {
        return $this->belongsTo(GetPesertadidik::class, 'peserta_didik_id')->latest();
    }
}
