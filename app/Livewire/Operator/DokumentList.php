<?php

namespace App\Livewire\Operator;

use App\Models\Dokument;
use Livewire\Component;
use Livewire\WithPagination;

class DokumentList extends Component
{
    use WithPagination;

    public $modal;
    public $dokuments = [];
    public $dokument;

    function fullItem(Dokument $dokument)
    {
        $this->modal = 'fullItem';
        $this->dokument = $dokument;
    }

    function lihat($peserta_didik_id)
    {
        $this->dokuments = Dokument::where('peserta_didik_id', $peserta_didik_id)->get();
        $this->modal = 'lihat';
    }

    public function render()
    {
        return view('livewire.operator.dokument-list', [
            'document_list' => Dokument::with('peserta_didik')
                // ->whereHas('peserta_didik', function($q) {
                //     $q->where('peserta_didik_id')
                // })
                ->groupBy('peserta_didik_id')
                ->paginate(10),
        ]);
    }
}
