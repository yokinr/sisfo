<?php

namespace App\Livewire\SuperAdmin;

use App\Livewire\Forms\KoneksiForm;
use App\Livewire\PesertaDidik;
use App\Models\AnggotaRombel;
use App\Models\GetGtk;
use App\Models\GetPesertadidik;
use App\Models\GetRombonganbelajar;
use App\Models\Koneksi;
use App\Models\Pembelajaran;
use App\Models\RwyKepangkatan;
use App\Models\RwyPendFormal;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DataUtama extends Component
{
    public KoneksiForm $form;

    public $modal;

    public $koneksi_id;
    public $koneksi;

    public $data = [];

    function getPengguna()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->koneksi->token,
        ])->get($this->koneksi->host . '/WebService/getPengguna?npsn=' . $this->koneksi->npsn);
        $this->data = collect($response->json());
        if ($this->data) {
            foreach ($this->data['rows'] as $key => $value) {
                User::updateOrInsert([
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
        }
    }

    function getRombonganBelajar()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->koneksi->token,
        ])->get($this->koneksi->host . '/WebService/getRombonganBelajar?npsn=' . $this->koneksi->npsn);
        $this->data = collect($response->json());
        if ($this->data) {
            foreach ($this->data['rows'] as $key => $value) {
                GetRombonganbelajar::updateOrInsert([
                    "rombongan_belajar_id" => $value['rombongan_belajar_id'],
                    "nama" => $value['nama'],
                    "tingkat_pendidikan_id" => $value['tingkat_pendidikan_id'],
                    "tingkat_pendidikan_id_str" => $value['tingkat_pendidikan_id_str'],
                    "semester_id" => $value['semester_id'],
                    "jenis_rombel" => $value['jenis_rombel'],
                    "jenis_rombel_str" => $value['jenis_rombel_str'],
                    "kurikulum_id" => $value['kurikulum_id'],
                    "kurikulum_id_str" => $value['kurikulum_id_str'],
                    "id_ruang" => $value['id_ruang'],
                    "id_ruang_str" => $value['id_ruang_str'],
                    "moving_class" => $value['moving_class'],
                    "ptk_id" => $value['ptk_id'],
                    "ptk_id_str" => $value['ptk_id_str'],
                    "jurusan_id" => $value['jurusan_id'],
                    "jurusan_id_str" => $value['jurusan_id_str'],
                ]);

                if ($value['anggota_rombel']) {
                    foreach ($value['anggota_rombel'] as $key1 => $value1) {
                        AnggotaRombel::updateOrInsert([
                            "anggota_rombel_id" => $value1['anggota_rombel_id'],
                            "rombongan_belajar_id" => $value['rombongan_belajar_id'],
                            "peserta_didik_id" => $value1['peserta_didik_id'],
                            "jenis_pendaftaran_id" => $value1['jenis_pendaftaran_id'],
                            "jenis_pendaftaran_id_str" => $value1['jenis_pendaftaran_id_str'],
                            'semester_id' => $value['semester_id'],
                        ]);
                    }
                }

                // if ($value['pembelajaran']) {
                //     foreach ($value['pembelajaran'] as $key3 => $value3) {
                //         Pembelajaran::updateOrInsert([
                //             "pembelajaran_id" => $value3['pembelajaran_id'],
                //             "rombongan_belajar_id" => $value['rombongan_belajar_id'],
                //             "mata_pelajaran_id" => $value3['mata_pelajaran_id'],
                //             "mata_pelajaran_id_str" => $value3['mata_pelajaran_id_str'],
                //             "ptk_terdaftar_id" => $value3['ptk_terdaftar_id'],
                //             "ptk_id" => $value3['ptk_id'],
                //             "nama_mata_pelajaran" => $value3['nama_mata_pelajaran'],
                //             "induk_pembelajaran_id" => $value3['induk_pembelajaran_id'],
                //             "jam_mengajar_per_minggu" => $value3['jam_mengajar_per_minggu'],
                //             "status_di_kurikulum" => $value3['status_di_kurikulum'],
                //             "status_di_kurikulum_str" => $value3['status_di_kurikulum_str'],
                //             'semester_id' => $value['semester_id'],
                //         ]);
                //     }
                // }
            }
        }
    }

    function getGtk()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->koneksi->token,
        ])->get($this->koneksi->host . '/WebService/getGtk?npsn=' . $this->koneksi->npsn);
        $this->data = collect($response->json());
        if ($this->data) {
            foreach ($this->data['rows'] as $key => $value) {
                GetGtk::updateOrInsert([
                    "ptk_id" => $value['ptk_id'],
                    "tahun_ajaran_id" => $value['tahun_ajaran_id'],
                ], [
                    "tahun_ajaran_id" => $value['tahun_ajaran_id'],
                    "ptk_terdaftar_id" => $value['ptk_terdaftar_id'],
                    "ptk_id" => $value['ptk_id'],
                    "ptk_induk" => $value['ptk_induk'],
                    "tanggal_surat_tugas" => $value['tanggal_surat_tugas'],
                    "nama" => $value['nama'],
                    "jenis_kelamin" => $value['jenis_kelamin'],
                    "tempat_lahir" => $value['tempat_lahir'],
                    "tanggal_lahir" => $value['tanggal_lahir'],
                    "agama_id" => $value['agama_id'],
                    "agama_id_str" => $value['agama_id_str'],
                    "nuptk" => $value['nuptk'],
                    "nik" => $value['nik'],
                    "jenis_ptk_id" => $value['jenis_ptk_id'],
                    "jenis_ptk_id_str" => $value['jenis_ptk_id_str'],
                    "status_kepegawaian_id" => $value['status_kepegawaian_id'],
                    "status_kepegawaian_id_str" => $value['status_kepegawaian_id_str'],
                    "nip" => $value['nip'],
                    "pendidikan_terakhir" => $value['pendidikan_terakhir'],
                    "bidang_studi_terakhir" => $value['bidang_studi_terakhir'],
                    "pangkat_golongan_terakhir" => $value['pangkat_golongan_terakhir'],
                ]);
                if ($value['rwy_pend_formal']) {
                    foreach ($value['rwy_pend_formal'] as $key1 => $value1) {
                        RwyPendFormal::updateOrInsert([
                            'riwayat_pendidikan_formal_id' => $value1['riwayat_pendidikan_formal_id'],
                            'ptk_id' => $value['ptk_id'],
                        ], [
                            "riwayat_pendidikan_formal_id" => $value1['riwayat_pendidikan_formal_id'],
                            'ptk_id' => $value['ptk_id'],
                            "satuan_pendidikan_formal" => $value1['satuan_pendidikan_formal'],
                            "fakultas" => $value1['fakultas'],
                            "kependidikan" => $value1['kependidikan'],
                            "tahun_masuk" => $value1['tahun_masuk'],
                            "tahun_lulus" => $value1['tahun_lulus'],
                            "nim" => $value1['nim'],
                            "status_kuliah" => $value1['status_kuliah'],
                            "semester" => $value1['semester'],
                            "ipk" => $value1['ipk'],
                            "prodi" => $value1['prodi'],
                            "id_reg_pd" => $value1['id_reg_pd'],
                            "bidang_studi_id_str" => $value1['bidang_studi_id_str'],
                            "jenjang_pendidikan_id_str" => $value1['jenjang_pendidikan_id_str'],
                            "gelar_akademik_id_str" => $value1['gelar_akademik_id_str'],
                        ]);
                    }
                }

                if ($value['rwy_kepangkatan']) {
                    foreach ($value['rwy_kepangkatan'] as $key2 => $value2) {
                        RwyKepangkatan::updateOrInsert([
                            "riwayat_kepangkatan_id" => $value2['riwayat_kepangkatan_id'],
                            'ptk_id' => $value['ptk_id'],
                            "nomor_sk" => $value2['nomor_sk'],
                            "tanggal_sk" => $value2['tanggal_sk'],
                            "tmt_pangkat" => $value2['tmt_pangkat'],
                            "masa_kerja_gol_tahun" => $value2['masa_kerja_gol_tahun'],
                            "masa_kerja_gol_bulan" => $value2['masa_kerja_gol_bulan'],
                            "pangkat_golongan_id_str" => $value2['pangkat_golongan_id_str'],
                        ]);
                    }
                }
            }
        }
    }

    function getPesertaDidik()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->koneksi->token,
        ])->get($this->koneksi->host . '/WebService/getPesertaDidik?npsn=' . $this->koneksi->npsn);
        $this->data = collect($response->json());
        if ($this->data) {
            foreach ($this->data['rows'] as $key => $value) {
                GetPesertadidik::updateOrInsert([
                    "peserta_didik_id" => $value['peserta_didik_id'],
                    "semester_id" => $value['semester_id'],
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
        }
    }

    function getSekolah()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->koneksi->token,
        ])->get($this->koneksi->host . '/WebService/getSekolah?npsn=' . $this->koneksi->npsn);
        $this->data = collect($response->json());
        if ($this->data) {
            Sekolah::firstOrCreate([
                "sekolah_id" => $this->data['rows']['sekolah_id'],
            ], [
                "sekolah_id" => $this->data['rows']['sekolah_id'],
                "nama" => $this->data['rows']['nama'],
                "nss" => $this->data['rows']['nss'],
                "npsn" => $this->data['rows']['npsn'],
                "bentuk_pendidikan_id" => $this->data['rows']['bentuk_pendidikan_id'],
                "bentuk_pendidikan_id_str" => $this->data['rows']['bentuk_pendidikan_id_str'],
                "status_sekolah" => $this->data['rows']['status_sekolah'],
                "status_sekolah_str" => $this->data['rows']['status_sekolah_str'],
                "alamat_jalan" => $this->data['rows']['alamat_jalan'],
                "rt" => $this->data['rows']['rt'],
                "rw" => $this->data['rows']['rw'],
                "kode_wilayah" => $this->data['rows']['kode_wilayah'],
                "kode_pos" => $this->data['rows']['kode_pos'],
                "nomor_telepon" => $this->data['rows']['nomor_telepon'],
                "nomor_fax" => $this->data['rows']['nomor_fax'],
                "email" => $this->data['rows']['email'],
                "website" => $this->data['rows']['website'],
                "is_sks" => $this->data['rows']['is_sks'],
                "lintang" => $this->data['rows']['lintang'],
                "bujur" => $this->data['rows']['bujur'],
                "dusun" => $this->data['rows']['dusun'],
                "desa_kelurahan" => $this->data['rows']['desa_kelurahan'],
                "kecamatan" => $this->data['rows']['kecamatan'],
                "kabupaten_kota" => $this->data['rows']['kabupaten_kota'],
                "provinsi" => $this->data['rows']['provinsi'],
            ])->id;
            // $this->reset();
        }
    }

    public function updateKoneksi()
    {
        $this->validate();
        Koneksi::create([
            'host' => $this->form->host,
            'token' => $this->form->token,
            'npsn' => $this->form->npsn,
        ])->id;
        $this->reset('modal', 'koneksi');
    }

    function pengaturanKoneksi()
    {
        if ($this->koneksi) {
            $this->form->host = $this->koneksi->host;
            $this->form->token = $this->koneksi->token;
            $this->form->npsn = $this->koneksi->npsn;
            $this->modal = 'updateKoneksi';
        } else {
            $this->form->host = '';
            $this->form->token = '';
            $this->form->npsn = '';
            $this->modal = 'updateKoneksi';
        }
    }

    function close()
    {
        $this->reset('modal');
    }

    function mount()
    {
        $this->koneksi = Koneksi::first();
    }

    public function render()
    {
        return view('livewire.super-admin.data-utama', [
            'sekolah' => Sekolah::count(),
            'gtk' => GetGtk::count(),
            'kepangkatan' => RwyKepangkatan::count(),
            'pend_formal' => RwyPendFormal::count(),
            'rombel' => GetRombonganbelajar::count(),
            'anggota_rombel' => AnggotaRombel::count(),
            'pembelajaran' => Pembelajaran::count(),
            'peserta_didik' => GetPesertadidik::count(),
            'pengguna' => User::count(),
        ]);
    }
}
