<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\ContactUs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::truncate();
        // Book::truncate();
        // category::truncate();
        // User::factory()->count(2)->create();

        User::factory()->create([
            'name' => 'System Admin',
            'is_admin' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminpass')
        ]);
        ContactUs::factory()->count(15)->create();



    }
}
