<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'role' => 'superadmin',
          'unit_kerja_id' => 0,
          'email_verified_at' => now(),
          'password' => '$2y$10$NsgRhF0jJkOYz8DwDF3CIOLRoR6HwfA2d.3mafEym.dWegljUqNTe',
        ]);

        $user->assignRole('superadmin');
    }
}
