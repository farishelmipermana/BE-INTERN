<?php

namespace Database\Seeders;

use App\Models\Superadmin;
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
        // \App\Models\User::factory(10)->create();
        Superadmin::create([
            'username'=>'super',
            'password'=>bcrypt(123)
        ]);
    }
}
