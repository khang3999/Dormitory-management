<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        DB::table('users')->insert([
            'name' => 'khang',
            'email' => 'huukhang@gmail.com',
            'password' => '123',
        ]);

        DB::table('events')->insert([
            'id' => 0,
            'title' => 'Thông báo miễn giảm học phí',
            'content' => 'latfbnigyiauombaeiuNOm',
            'img' => 'banner.jpg',
            'type' => 'none'
        ]);
    }
}
