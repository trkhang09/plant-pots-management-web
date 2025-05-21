<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('statuses')->insert([
            ['name' => 'Còn hàng', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Hết hàng', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Ngừng kinh doanh', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
