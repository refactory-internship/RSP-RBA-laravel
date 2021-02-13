<?php

namespace Database\Seeders;

use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
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
        for ($i = 0; $i < 10; $i++) {
            DB::table('rooms')->insert([
                'room_name' => Lorem::word(),
                'room_capacity' => 10 + ($i * 5),
                'created_at' => date($date_format),
                'updated_at' => date($date_format)
            ]);
        }
    }
}
