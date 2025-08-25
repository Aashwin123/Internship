<?php

namespace Database\Seeders;
use App\Models\User;   // ✅ add this
use App\Models\Post; 

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $editor = User::where('email','editor@example.com')->first();
    $admin  = User::where('email','admin@example.com')->first();

    Post::firstOrCreate(
        ['title' => 'Hello from Editor'],
        ['body' => 'Editor owns this post', 'user_id' => $editor->id]
    );

    Post::firstOrCreate(
        ['title' => 'Admin Post'],
        ['body' => 'Admin owns this post', 'user_id' => $admin->id]
    );
    }
}
