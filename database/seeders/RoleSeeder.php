<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Szerepkör létrehozása
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        // Példa: első felhasználónak admin szerepkör
        $user = User::first();
        if ($user) {
            $user->roles()->attach($adminRole->id);
        }
    }
}
