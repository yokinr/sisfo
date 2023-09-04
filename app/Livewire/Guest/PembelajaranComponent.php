<?php

namespace App\Livewire\Guest;

use App\Models\GetRombonganbelajar;
use App\Models\Pembelajaran;
use Livewire\Component;
use Livewire\WithPagination;

class PembelajaranComponent extends Component
{
    use WithPagination;

    public $search = '';
    public $jenis_rombel;
    public $rombel;
    public $semester_id;

    public $JJM;

    function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $semesters = Pembelajaran::select('semester_id')->distinct()->latest()->get();
        if (!$this->rombel) {
            $this->semester_id = $semesters[0]->semester_id;
        }
        $jenis_rombels = GetRombonganbelajar::select('jenis_rombel', 'jenis_rombel_str')->distinct()->where('semester_id', $this->semester_id)->get();
        if (!$this->jenis_rombel) {
            $this->jenis_rombel = $jenis_rombels[0]->jenis_rombel;
        }
        $rombels = GetRombonganbelajar::where(['semester_id' => $this->semester_id, 'jenis_rombel' => $this->jenis_rombel])->orderBy('nama')->get();
        if (!$this->rombel) {
            $this->rombel = $rombels[0]->rombongan_belajar_id;
        }
        return view('livewire.guest.pembelajaran-component', [
            'semesters' => $semesters,
            'jenis_rombels' => $jenis_rombels,
            'rombels' => $rombels,
            'pembelajarans' => Pembelajaran::with('rombel')
                ->where(['semester_id' => $this->semester_id, 'rombongan_belajar_id' => $this->rombel])
                ->paginate(15),
        ]);
    }
}
