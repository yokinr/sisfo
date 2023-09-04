<?php

namespace App\Livewire\Guest;

use App\Models\GetGtk;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PembelajaranGtkComponent extends Component
{
    use WithPagination;

    public $ptk_id;
    public $semester_id;

    public $gtk;
    public $jjm;

    function mount($ptk_id, $semester_id)
    {
        $this->ptk_id = $ptk_id;
        $this->semester_id = $semester_id;
        $this->gtk = GetGtk::where(['ptk_id' => $this->ptk_id, 'tahun_ajaran_id' => substr($this->semester_id, 0, 4)])->first();
    }

    public function render(Request $request)
    {
        return view('livewire.guest.pembelajaran-gtk-component', [
            'pembelajarans' => Pembelajaran::with(['rombel'])
                ->where(['ptk_id' => $this->ptk_id, 'semester_id' => $this->semester_id])
                // ->orderBy('rombongan_belajar_id')
                ->paginate(10),
        ]);
    }
}
