<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date_format = 'Y-m-d H:i:s';
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'created_at' => date($date_format),
                'updated_at' => date($date_format),
            ],
            [
                'name' => 'Guest',
                'created_at' => date($date_format),
                'updated_at' => date($date_format),
            ]
        ]);
    }
}
