<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Koneksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Operator Sekolah',
            'email' => 'admin@example.com',
            'peran_id_str' => 'Super Admin',
        ])->id;

        Koneksi::create([
            'host' => 'http://localhost:5774',
            'token' => 'lx1UkWUJyJszuyz',
            'npsn' => '10303912',
        ])->id;
    }
}
