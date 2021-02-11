<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $password = 'password';
        $date_format = 'Y-m-d H:i:s';

        DB::table('users')->insert([
            [
                'email' => 'admin@mail.com',
                'password' => Hash::make($password),
                'role_id' => 1,
                'created_at' => date($date_format),
                'updated_at' => date($date_format)
            ],
            [
                'email' => 'fajar@mail.com',
                'password' => Hash::make($password),
                'role_id' => 2,
                'created_at' => date($date_format),
                'updated_at' => date($date_format)
            ]
        ]);
    }
}
