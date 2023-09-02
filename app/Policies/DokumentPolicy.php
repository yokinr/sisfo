<?php

namespace App\Policies;

use App\Models\Dokument;
use App\Models\User;

class DokumentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    function viewPd(User $user, Dokument $dokument)
    {
        return $user->peserta_didik_id === $dokument->peserta_didik_id;
    }
}
