<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'Rosemarie Faller',
                'email' => 'rosemariefaller48@gmail.com',
                // 'address' => 'Brgy. Lamak Hilongos, Leyte',
                'otp_code' => 1,
                'password'=>  Hash::make('12345678'),
            ],
            [
                'name'=>'Fred Fritz',
                'email' => 'fredfritza@gmail.com',
                // 'address' => 'Mabini St. Hilongos, Leyte',
                'otp_code' => 2,
                'password'=>  Hash::make('12345678'),
            ]

            ]);
    }
}
