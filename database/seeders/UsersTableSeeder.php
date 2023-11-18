<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert a specific user
        DB::table('users')->insert([
            'name'=>"hermela",
            'email' => 'hermela@gmail.com',
            'password' => Hash::make('admin@hermela@password'),
        ]);

    }
}
