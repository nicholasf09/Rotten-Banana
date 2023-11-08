<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'cw',
            'email' => 'cw@gmail.com',
            'password' => bcrypt('password'),
            'role_as' => 1,
            
        ]);

        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'cw',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
            'role_as' => 0,
            
        ]);
    }
}
