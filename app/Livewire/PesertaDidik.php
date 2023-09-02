<?php

namespace App\Livewire;

use App\Models\GetPesertadidik;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;

class PesertaDidik extends Component
{
    use WithPagination;
    public $data = [];
    public $tidakAkun = [];

    function akun()
    {
        $this->tidakAkun = GetPesertadidik::get();
        foreach ($this->tidakAkun as $key => $value) {
            $coba = User::firstOrCreate([
                'peserta_didik_id' => $value->peserta_didik_id
            ], [
                'peserta_didik_id' => $value->peserta_didik_id,
                'name' => $value->nama,
                'email' => $value->nisn . '@10303912.pd.id',
                'password' => bcrypt($value->tanggal_lahir),
                'peran_id_str' => 'Peserta Didik',
            ])->id;
        }
        $this->reset();
    }

    function loadData()
    {

        $token = 'lx1UkWUJyJszuyz'; // Ganti dengan token Anda
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:5774/WebService/getPesertaDidik?npsn=10303912'); // Ganti URL API sesuai dengan kebutuhan Anda
        $this->data = collect($response->json());
        foreach ($this->data['rows'] as $key => $value) {
            GetPesertadidik::firstOrCreate([
                "peserta_didik_id" => $value['peserta_didik_id'],
            ], [
                "registrasi_id" => $value['registrasi_id'],
                "jenis_pendaftaran_id" => $value['jenis_pendaftaran_id'],
                "jenis_pendaftaran_id_str" => $value['jenis_pendaftaran_id_str'],
                "nipd" => $value['nipd'],
                "tanggal_masuk_sekolah" => $value['tanggal_masuk_sekolah'],
                "sekolah_asal" => $value['sekolah_asal'],
                "peserta_didik_id" => $value['peserta_didik_id'],
                "nama" => $value['nama'],
                "nisn" => $value['nisn'],
                "jenis_kelamin" => $value['jenis_kelamin'],
                "nik" => $value['nik'],
                "tempat_lahir" => $value['tempat_lahir'],
                "tanggal_lahir" => $value['tanggal_lahir'],
                "agama_id" => $value['agama_id'],
                "agama_id_str" => $value['agama_id_str'],
                "alamat_jalan" => $value['alamat_jalan'],
                "nomor_telepon_rumah" => $value['nomor_telepon_rumah'],
                "nomor_telepon_seluler" => $value['nomor_telepon_seluler'],
                "nama_ayah" => $value['nama_ayah'],
                "pekerjaan_ayah_id" => $value['pekerjaan_ayah_id'],
                "pekerjaan_ayah_id_str" => $value['pekerjaan_ayah_id_str'],
                "nama_ibu" => $value['nama_ibu'],
                "pekerjaan_ibu_id" => $value['pekerjaan_ibu_id'],
                "pekerjaan_ibu_id_str" => $value['pekerjaan_ibu_id_str'],
                "nama_wali" => $value['nama_wali'],
                "pekerjaan_wali_id" => $value['pekerjaan_wali_id'],
                "pekerjaan_wali_id_str" => $value['pekerjaan_wali_id_str'],
                "anak_keberapa" => $value['anak_keberapa'],
                "tinggi_badan" => $value['tinggi_badan'],
                "berat_badan" => $value['berat_badan'],
                "email" => $value['email'],
                "semester_id" => $value['semester_id'],
                "anggota_rombel_id" => $value['anggota_rombel_id'],
                "rombongan_belajar_id" => $value['rombongan_belajar_id'],
                "tingkat_pendidikan_id" => $value['tingkat_pendidikan_id'],
                "nama_rombel" => $value['nama_rombel'],
                "kurikulum_id" => $value['kurikulum_id'],
                "kurikulum_id_str" => $value['kurikulum_id_str'],
                "kebutuhan_khusus" => $value['kebutuhan_khusus'],
            ]);
        }

        $this->reset();
    }

    public function render()
    {
        return view('livewire.peserta-didik', [
            'peserta_didik' => GetPesertadidik::paginate(10),
        ]);
    }
}
