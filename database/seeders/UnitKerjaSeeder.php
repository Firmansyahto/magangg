<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UnitKerja;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $unit_kerja = UnitKerja::create([
        'kode_unit' => Str::random(6),
        'nama_unit' => 'jakarta',
        // 'alamat' => 'jakarta',
        // 'telepon' => '0123456789',
        // 'email' => 'jakarta@gmail.com',
        'slug' => 'jakarta',
      ]);
    }
}
