<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetPesertadidik extends Model
{
    use HasUuids;
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'peserta_didik_id');
    }

    protected $guarded = [];

    protected $primaryKey = 'peserta_didik_id';
}
