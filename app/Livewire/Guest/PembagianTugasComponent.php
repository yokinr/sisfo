<?php

namespace App\Livewire\Guest;

use App\Models\GetGtk;
use App\Models\Pembelajaran;
use Livewire\Component;
use Livewire\WithPagination;

class PembagianTugasComponent extends Component
{
    use WithPagination;

    public $semester;
    public $gtk;

    public $jjm;

    public function render()
    {
        $semesters = Pembelajaran::select('semester_id')->distinct()
            ->get();
        if ($semesters) {
            if (!$this->semester) {
                $this->semester = $semesters[0]->semester_id;
            }
            $gtks = GetGtk::where('tahun_ajaran_id', substr($this->semester, 0, 4))
                ->where('jenis_ptk_id', '!=', 11)
                ->where('jenis_ptk_id', '!=', 43)
                ->where('jenis_ptk_id', '!=', 42)
                ->where('jenis_ptk_id', '!=', 20)
                ->orderBy('nama', 'asc')
                ->get();
            if ($gtks) {
                if (!$this->gtk) {
                    $this->gtk = $gtks[0]->ptk_id;
                }
            }
        } else {
            $gtk = [];
        }

        return view('livewire.guest.pembagian-tugas-component', [
            'semesters' => $semesters,
            'gtks' => $gtks,
            'pembelajarans' => Pembelajaran::with('rombel', 'gtk')
                ->where('semester_id', $this->semester)
                ->where('ptk_id', 'like', '%' . $this->gtk . '%')
                ->paginate(10)
        ]);
    }
}
