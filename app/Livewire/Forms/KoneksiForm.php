<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class KoneksiForm extends Form
{
    #[Rule('required')]
    public $host;
    #[Rule('required')]
    public $token;
    #[Rule('required|numeric')]
    public $npsn;
}
