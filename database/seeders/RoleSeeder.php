<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      \App\Models\Role::upsert([
        ['name' => 'Admin',  'slug' => 'admin'],
        ['name' => 'Editor', 'slug' => 'editor'],
        ['name' => 'Viewer', 'slug' => 'viewer'],
    ], ['slug'], ['name']);
    }
}
