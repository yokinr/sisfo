<?php

namespace App\Livewire\SuperAdmin;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pengguna extends Component
{
    use WithPagination;

    public $modal;

    #[Rule('required|min:8|confirmed')]
    public $password;
    #[Rule('required|same:password')]
    public $password_confirmation;

    public $search = '';
    public $peran  = '';
    public $pengguna_id;

    function updatePassword()
    {
        $this->validate();
        User::where('pengguna_id', $this->pengguna_id)->update(['password' => bcrypt($this->password)]);
        $this->reset('modal');
    }

    function delete(User $pengguna)
    {
        $this->js("confirm('Anda Yakin akan menghapus akun: " . $pengguna->email . "')");
        $pengguna->delete();
        $this->reset();
    }

    function resetPassword(User $pengguna)
    {
        $this->pengguna_id = $pengguna->pengguna_id;
        $this->modal = 'updatePassword';
        // dd($pengguna);
    }

    function close()
    {
        $this->reset('modal');
    }

    public function render()
    {
        return view('livewire.super-admin.pengguna', [
            'pengguna' => User::with('peserta_didik', 'gtk')
                ->where('peran_id_str', 'like', '%' . $this->peran . '%')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('peran_id_str', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }
}
