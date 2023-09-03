<?php

namespace App\Livewire;

use App\Models\Dokument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class DokumentUserComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $modal = '';
    public $peserta_didik_id;
    public $ptk_id;
    public $dokument_id;
    public $dokument_url;
    #[Rule('required|max:100')]
    public $title;
    #[Rule('required|image|min:64|max:256')]
    public $images;

    function delete()
    {
        Dokument::where(['dokument_id' => $this->dokument_id, 'ptk_id' => $this->ptk_id, 'peserta_didik_id' => $this->peserta_didik_id])->delete();
        File::delete('storage/' . $this->dokument_url);
        $this->reset('modal', 'title', 'images', 'peserta_didik_id', 'ptk_id', 'dokument_id', 'dokument_url');
    }

    function update()
    {
        $this->validate();
        if (File::delete('storage/' . $this->dokument_url)) {
            Dokument::where(['dokument_id' => $this->dokument_id, 'ptk_id' => $this->ptk_id, 'peserta_didik_id' => $this->peserta_didik_id])->update([
                'title' => $this->title,
                'url' => $this->images->store('storage', 'public'),
            ]);
            $this->reset('modal', 'title', 'images', 'peserta_didik_id', 'ptk_id', 'dokument_id', 'dokument_url');
        } else {
            dd('File does not exists.');
        }
    }

    function edit()
    {
        if (Dokument::where(['dokument_id' => $this->dokument_id, 'ptk_id' => $this->ptk_id, 'peserta_didik_id' => $this->peserta_didik_id])->first()) {
            $this->modal = 'update';
        } else {
            dd('Mohon maaf, Anda tidak diizinkan untuk mengakses halaman ini!');
        }
    }

    function preview(Dokument $dokument)
    {
        $this->authorize('viewPd', $dokument);
        $this->ptk_id = auth()->user()->ptk_id;
        $this->peserta_didik_id = auth()->user()->peserta_didik_id;
        $this->dokument_id = $dokument->dokument_id;
        $this->title = $dokument->title;
        $this->dokument_url = $dokument->url;
        $this->modal = 'preview';
    }

    function store()
    {
        $this->validate();
        Dokument::create([
            'ptk_id' => auth()->user()->ptk_id,
            'peserta_didik_id' => auth()->user()->peserta_didik_id,
            'title' => $this->title,
            'url' => $this->images->store('storage', 'public'),
        ])->id;
        File::delete('livewire-tmp' . $this->images->store('storage', 'public'));
        $this->reset();
    }

    function uploadDokument()
    {
        $this->modal = 'store';
    }

    function close()
    {
        $this->reset('modal', 'title', 'images', 'peserta_didik_id', 'ptk_id', 'dokument_id', 'dokument_url');
    }

    public function render()
    {
        return view('livewire.dokument-user-component', [
            'dokuments' => Dokument::where('peserta_didik_id', auth()->user()->peserta_didik_id)->paginate('10'),
        ]);
    }
}
