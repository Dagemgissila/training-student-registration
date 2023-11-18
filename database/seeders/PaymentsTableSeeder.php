<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker; // Import the Faker class

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert a specific user
        DB::table('payment_infos')->insert([
            'id'=>1,
            'amount' => 3500,
            'month' => 1,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);

        DB::table('payment_infos')->insert([
            'id'=>2,
            'amount' => 6000,
            'month' => 2,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);

        DB::table('payment_infos')->insert([
            'id'=>3,
            'amount' => 9000,
            'month' => 3,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);

        DB::table('payment_infos')->insert([
            'id'=>4,
            'amount' => 11000,
            'month' => 4,
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
    }
}
