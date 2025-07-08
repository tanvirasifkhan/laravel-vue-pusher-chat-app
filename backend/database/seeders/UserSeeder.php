<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks=0");

        User::truncate();

        User::insert([
            [
                'name' => 'Asif Khan',
                'email' => 'asif.khan@gmail.com',
                'password' => bcrypt('asifkhan')
            ],
            [
                'name' => 'Tanvir Ahmed',
                'email' => 'tanvir.ahmed@gmail.com',
                'password' => bcrypt('tanvir')
            ],
            [
                'name' => 'Rubel Hasan',
                'email' => 'rubel.hasan@gmail.com',
                'password' => bcrypt('rubel')
            ]
        ]);
    }
}
