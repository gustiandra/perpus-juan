<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'name' => 'Juan Martin',
            'email' => 'juan@mail.test',
            'password' => bcrypt('11111111'),
            'email_verified_at' => now()
        ]);
    }
}
