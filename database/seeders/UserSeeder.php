<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'Administrator',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('password'),
            'account_type'  => 1,
            'status'        => 1,
        ]);
    }
}
