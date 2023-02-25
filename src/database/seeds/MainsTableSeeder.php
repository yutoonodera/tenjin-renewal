<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numbers = ['1', '2', '3', '4', '5'];
        foreach ($numbers as $number) {
            DB::table('mains')->insert([
                'title' => 'メイン' . $number,
                'url' => 'main' . $number,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
