<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $admin  = User::firstOrCreate(
        ['email' => 'admin@example.com'],
        ['name' => 'Admin',  'password' => Hash::make('password')]
    );
    $editor = User::firstOrCreate(
        ['email' => 'editor@example.com'],
        ['name' => 'Editor', 'password' => Hash::make('password')]
    );
    $viewer = User::firstOrCreate(
        ['email' => 'viewer@example.com'],
        ['name' => 'Viewer', 'password' => Hash::make('password')]
    );

    $admin->roles()->syncWithoutDetaching([Role::where('slug','admin')->value('id')]);
    $editor->roles()->syncWithoutDetaching([Role::where('slug','editor')->value('id')]);
    $viewer->roles()->syncWithoutDetaching([Role::where('slug','viewer')->value('id')]);
    }
}
