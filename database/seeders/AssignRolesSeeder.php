<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Fetch all users
        $users = User::all();

        // Loop through each user
        foreach ($users as $user) {
            // Assign role based on the user's role column
            $role = Role::findByName($user->role);
            $user->assignRole($role);
        }
                
    }
}
