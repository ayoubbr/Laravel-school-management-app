<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        // \App\Models\AssignStudent::factory(10)->create();
        // \App\Models\StudentClass::factory(10)->create();
        // \App\Models\StudentYear::factory(10)->create();
        // \App\Models\AssignStudent::factory(10)->create();
        // \App\Models\User::factory(10)->create();
    }
}
