<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public $data = [];

    function loadData()
    {

        $token = 'lx1UkWUJyJszuyz'; // Ganti dengan token Anda
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:5774/WebService/getPengguna?npsn=10303912'); // Ganti URL API sesuai dengan kebutuhan Anda
        $this->data = collect($response->json());
        foreach ($this->data['rows'] as $key => $value) {
            User::firstOrCreate([
                'ptk_id' => $value['ptk_id'],
                'peserta_didik_id' => $value['peserta_didik_id'],
            ], [
                'pengguna_id' => $value['pengguna_id'],
                'name' => $value['nama'],
                'email' => $value['username'],
                'password' => $value['password'],
                'peran_id_str' => $value['peran_id_str'],
                'ptk_id' => $value['ptk_id'],
                'peserta_didik_id' => $value['peserta_didik_id']
            ]);
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::with('peserta_didik')
                // ->whereHas('peserta_didik', function ($q) {
                //     $q->where('peserta_didiik_id', '!=', '');
                // })
                ->paginate('10'),
        ]);
    }
}
