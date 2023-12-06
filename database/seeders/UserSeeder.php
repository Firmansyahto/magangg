<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unitKerjas = UnitKerja::all();
        $roles = ['superadmin', 'admin gudang', 'staf'];
        $jabatans = ['Admin', 'gudang', 'staf']; // replace with your actual jabatans
        $cities = [
            "pusat",
            "DI Yogyakarta",
            "Nusa Tenggara Timur",
            "Sulawesi Utara",
            "Sumatera Utara",
            "Jawa Barat",
            "Jawa Timur",
            "Kalimantan Selatan",
            "Maluku",
            "Sulawesi Tengah",
            "Sulawesi Tenggara",
            "Kalimantan Tengah",
            "Sumatera Selatan",
            "Nusa Tenggara Barat",
            "Jawa Tengah",
            "Sumatera Barat",
            "Riau",
            "Aceh",
            "Sulawesi Selatan",
            "Bengkulu",
            "Lampung",
            "Jambi",
            "Kalimantan Barat",
            "Kepulauan Riau",
            "Banten",
            "Kalimantan Timur",
            "Bali",
            "Sulawesi Barat",
            "Maluku Utara",
            "Papua Barat",
            "Papua",
            "Gorontalo",
            "Kepulauan Bangka Belitung",
            "Kalimantan Utara",
            "Jakarta Raya",
            "Jakarta"
        ];

        foreach ($unitKerjas as $index => $unitKerja) {
            $city = $cities[$index] ?? 'default';
            foreach ($roles as $roleIndex => $role) {
                $email = $role . $city . '@gmail.com';
                $email = str_replace(' ', '', $email); // Remove spaces
                $email = substr($email, 0, 34); // Limit email to 34 characters
                $name = $city . ' ' . $role;
                $slug = strtolower(str_replace(' ', '-', $name));
                if (!User::where('email', $email)->exists()) {

                    $user = User::create([
                        'unit_kerja_id' => $unitKerja->id,
                        'name' => $name,
                        'email' => $email,
                        'password' => Hash::make('password'),
                        'role' => $role,
                        'jabatan' => $jabatans[$roleIndex],
                        'path' => null,
                        'foto' => null,
                        'slug' => $slug
                    ]);

                    $user->assignRole($role);
                }
            }
        }
    }
}
 